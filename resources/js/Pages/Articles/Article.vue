<script setup>
import Header from '@/Components/Header.vue';
import AllLayout from '@/Layouts/AllLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import MainHeader from '@/Layouts/MainHeader.vue';

defineProps({
    article: '$string',
});
</script>

<template>

    <Head title="Статья" />


    <MainHeader>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Статья</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="px-6 text-gray-900">{{ article.header }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="px-6 text-gray-900">{{ article.body }}</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </MainHeader>


</template>


