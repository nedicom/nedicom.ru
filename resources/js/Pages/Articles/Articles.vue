<script setup>
import MainHeader from '@/Layouts/MainHeader.vue';

defineProps({
    articles: 'Array',
});
</script>

<template>
    <Head title="Статьи" />

    <MainHeader>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Статьи</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
                    <div v-if="articles.total > 0" class="grid grid-cols-3 gap-4">
                        <!-- card -->
                            <div v-for="articles in articles.data" :key="articles.id" class="flex justify-center">
                                <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
                                    <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">{{articles.header}}</h5>
                                    <p class="text-gray-700 text-base mb-2">
                                        {{articles.body}}
                                    </p>
                                    <a :href="'articles/' + articles.id" class="text-blue-500 underline dark:text-blue-500 hover:no-underline">подробнее</a>
                                    
                                </div>
                            </div>
                        <!-- card -->
                    </div>
            

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

                </div>
            </div>
        </div>
    </MainHeader>

    <Head title="Статьи" />

    


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

