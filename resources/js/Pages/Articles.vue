<script setup>
import Header from '@/Components/Header.vue';
import AllLayout from '@/Layouts/AllLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    articles: 'Array',
});
</script>

<template>
    <Head title="Статьи" />

    <Header> 
    </Header>

      <!-- Jumbotron -->
  <div class="text-center bg-gray-50 text-gray-800 py-20 px-6">
    <h1 class="text-5xl font-bold mt-0 mb-6">Статьи</h1>
    <h3 class="text-3xl font-bold mb-8">Subeading</h3>
  </div>
  <!-- Jumbotron -->
    
    <div v-if="articles.total > 0" class="grid grid-cols-3 gap-4">
      <!-- card -->
        <div v-for="articles in articles.data" :key="articles.id" class="flex justify-center">
            <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">{{articles.header}}</h5>
                <p class="text-gray-700 text-base mb-2">
                    {{articles.body}}
                </p>
            </div>
        </div>
    </div>
      <!-- card -->



            <!-- card -->
    <div v-else class="flex justify-center">
        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
            <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">Статей пока нет</h5>
            <p class="text-gray-700 text-base mb-2">
            Но вы можете добавить)) Для этого нужно просто начать
            </p> 
        </div>
    </div>
      <!-- card -->
      
      <Pagination :links="articles.links" />

    <AllLayout>
    </AllLayout>
</template>

<script>
import Pagination from '@/Components/Pagination.vue';
export default{
    components: {
        Pagination,
    }
}
</script>

