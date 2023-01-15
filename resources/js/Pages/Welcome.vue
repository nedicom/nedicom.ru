<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import MainHeader from '@/Layouts/MainHeader.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>
    <Head title="Главная" />

        <MainHeader>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Приветствие</h2>
        </template>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">   

       

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            Вам больше не надо искать юриста. Все здесь.
        </div>
    </div>
    </MainHeader>


</template>
