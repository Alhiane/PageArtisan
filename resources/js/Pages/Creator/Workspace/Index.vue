<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, router} from '@inertiajs/vue3';
import {reactive, ref, watch} from 'vue';
import Modal from "@/Components/Modal.vue";

// defined props
defineProps({
    user: Object,
    workspaces: Array,
    errors: Object,
});

// load image from public folder
const image = () => {
    return `${window.location.origin}/images/workspace.png`;
};

const confirmingUserDeletion = ref(false);

const closeModal = () => {
    confirmingUserDeletion.value = false;
};

const openConfirmModal = () => {
    confirmingUserDeletion.value = true;
};


// form
const form = reactive({
    name: '',
    tag: '',
});

// watch form changes on name
watch(() => form.name, (value) => {
    // check if value is not empty and replace spaces with hyphen and lowercase then assign to slug
    if (value) {
        form.tag = value.replace(/\s+/g, '-').toLowerCase();
    }
});

// submit form
function submit() {
    router.post(route('workspaces.store'), form, {
        preserveScroll: true,
        onSuccess: (result) =>{
            closeModal()
            router.push(route('workspaces.show', result.tag))
        }
    });
}

</script>

<template>
    <Head title="Workspaces"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Workspaces</h2>

                <a @click="openConfirmModal()"
                   class="text-white font-bold px-4 rounded flex">
                    <span class="px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z"/>
                        </svg>
                    </span>
                    Add Workspace
                </a>
            </div>


            <Modal :show="confirmingUserDeletion" @close="closeModal">
                <div class="p-6">

                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Create Workspace
                    </h2>

                    <div class="mt-4">
                        <form class="space-y-6" @submit.prevent="submit">
                            <div>
                                <label for="workspace_name"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Workspace
                                    Name</label>
                                <input v-model="form.name" type="text" name="workspace_name" id="workspace_name"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                       placeholder="My Workspace" required>

                                <div v-if="errors.name" class="px-2 py-2 text-red-400">{{ errors.name }}</div>

                            </div>
                            <div>
                                <label for="workspace_slug"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Slug</label>
                                <input v-model="form.tag" type="text" name="workspace_slug" id="workspace_slug"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                       placeholder="my-workspace" required>

                                <div v-if="errors.tag" class="px-2 py-2 text-red-400">{{ errors.tag }}</div>

                            </div>


                            <div class="flex justify-end items-center">
                                <button type="submit" :disabled="form.processing"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Create
                                </button>
                            </div>

                        </form>
                    </div>


                </div>
            </Modal>


        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                    <!-- Workspace Card 1 -->
                    <div v-for="workspace in workspaces" :key="workspace.id"
                         class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                        <img :src="image()" alt="Workspace 1" class="w-full h-48 object-cover"/>
                        <div class="p-4">

                            <a :href="route('workspaces.show', workspace.tag)"
                               class="text-indigo-500 inline-flex items-center font-semibold text-sm">
                                <h3 class="text-lg font-semibold mb-2 text-gray-800 dark:text-white">
                                    {{ workspace.name }} </h3>
                            </a>

                            <div class="flex justify-between items-center">

                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold tracking-wide text-gray-600 bg-gray-100 dark:bg-gray-700">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M10 2C5.03 2 1 5.13 1 9c0 1.66.58 3.19 1.54 4.4L1 19l5.5-1.5C7.81 18.94 8.88 19 10 19c4.97 0 9-3.13 9-7s-4.03-7-9-7zm0 12.5c-2.49 0-4.5-1.67-4.5-3.75S7.51 7 10 7s4.5 1.67 4.5 3.75S12.49 14.5 10 14.5z"></path>
                                    </svg>
                                    {{ workspace.comments_count }}
                                </span>

                                <span>
                                    <div
                                        class="mb-1 text-base font-medium text-blue-700 dark:text-blue-500">Progress</div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4 dark:bg-gray-700">
                                      <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                                    </div>
                                </span>

                            </div>
                        </div>
                    </div>

                    <!-- Add more Workspace Cards as needed -->


                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
