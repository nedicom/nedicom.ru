<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import MainHeader from '@/Layouts/MainHeader.vue';
</script>

<template>
    <Head title="Dashboard" />

    <MainHeader>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Профиль</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
               Вы авторизированы.                Ура

                </div>
            </div>
        </div>
    </MainHeader>
</template>
