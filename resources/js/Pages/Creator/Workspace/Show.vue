<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
    user: Object,
    workspace: Array,
    page: String,
});

</script>

<template>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Workspaces > {{workspace.name}} </h2>
            </div>
        </template>
    </AuthenticatedLayout>

<!--    // crate in iframe for displaying the page-->
<!--    <iframe src="{{page}}" frameborder="0" width="100%" height="100%"></iframe>-->

    <iframe :src="page" frameborder="0" width="100%" height="100%"></iframe>


</template>

<style scoped>

</style>
