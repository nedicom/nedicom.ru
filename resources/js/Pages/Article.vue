<script setup>
import AllLayout from '@/Layouts/AllLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    article: '$string',
});
</script>

<template>
    <Head title="Article" />

    <AllLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">test</div>
                </div>
            </div>
        </div>
        <div class="py-12">
            
            Hello, {{ article.body }}
        </div>
    </AllLayout>
</template>

