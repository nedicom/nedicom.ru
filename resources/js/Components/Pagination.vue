<script setup>
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/20/solid';
import {  Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <div  class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
      <div class="flex flex-1 justify-between sm:hidden">
        <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Назад</a>
        <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Вперед</a>
      </div>
      <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
        <div>

        </div>
        <div>
          <nav class="isolate inline-flex -space-x-px shadow-sm" aria-label="Pagination">
            <Link v-for="(link, k) in links"              
            :href = "link.url"
            :key="k"
            :disabled="link.url === null"
            :class="{'text-blue-500 font-bold': link.active, 'font-bold': link.url === null}"
            v-html="link.label" aria-current="page" class=" relative z-10 inline-flex items-center px-4 py-2 text-sm font-medium text-indigo-600 focus:z-20"/>
          </nav>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default{
    component: {
        Link,
    },
    props: {
        links: Array,
        
    }
  }
  </script>