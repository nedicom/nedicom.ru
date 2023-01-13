<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link                
                :href="route('articles')"
                class="text-sm text-gray-700 dark:text-gray-500 underline mr-4"
                >Статьи</Link
            >

            <Link                
                :href="route('lawyers')"
                class="text-sm text-gray-700 dark:text-gray-500 underline mr-8"
                >Юристы</Link
            >
    </div> 
</template>