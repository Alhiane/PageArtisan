<script setup>
defineEmits('open-modal');
// create function to open modal
const openModal = () => {
    const modal = document.getElementById('authentication-modal');
    modal.classList.remove('hidden');
}

// create function to close modal
const closeModal = () => {
    const modal = document.getElementById('authentication-modal');
    modal.classList.add('hidden');
}

// function for

</script>

<template>

    <!-- Main modal -->
    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
         class="before:absolute before:bg-blend-darken before:top-0 before:left-0 before:w-full before:h-full  fixed items-center justify-center flex z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button @click="closeModal()" type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Create New Workspace</h3>
                    <form class="space-y-6" action="#">
                        <div>
                            <label for="workspace_name"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Workspace
                                Name</label>
                            <input type="text" name="workspace_name" id="workspace_name"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                   placeholder="My Workspace" required>
                        </div>
                        <div>
                            <label for="workspace_slug"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Slug</label>
                            <input type="text" name="workspace_slug" id="workspace_slug"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                   placeholder="my-workspace" required>
                        </div>


                        <div class="flex justify-end items-center">
                            <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Create
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


</template>

<style scoped>

</style>
