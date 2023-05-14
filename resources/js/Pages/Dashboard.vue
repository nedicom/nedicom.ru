<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import Body from "@/Layouts/Body.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import { ref } from "vue";
import { Head } from "@inertiajs/inertia-vue3";

let title = ref("Панель управления");

defineProps({
  articles: "Array",
});

let number = 1;

</script>

<template>
  <Head title="Панель управления" />

  <MainHeader />

  <Header :ttl="title" />

  <Body>
    <div class="bg-white py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        
          <div v-if="articles.total > 0" class="grid gap-9">

            <!-- row -->
            <div
              v-for="articles in articles.data"
              :key="articles.id"
              class="flex justify-center"
            >
              <div
                class="
                  flex flex-row                 
                  min-w-full
                  p-6
                  rounded-lg
                  shadow-lg
                  bg-white
                  max-w-sm
                "
              >
                <span class="basis-1/12">{{articles.id}}</span>
                <h5
                  class="
                    basis-9/12
                    text-left                    
                    text-gray-900 text-xl
                    leading-tight                    
                    font-medium
                    mb-2
                  "
                >
                  {{ articles.header }}
                </h5>
                <a
                  :href="'articles/' + articles.url"
                  class="
                    basis-2/12
                    text-end              
                    text-blue-500
                    underline
                    dark:text-blue-500
                    hover:no-underline
                  "
                  >подробнее</a
                >
                <a 
                  class="btn btn-light w-100" 
                  :href="'articles/' + articles.id + '/delete'"
                  ><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /> </svg>
                </a>
                
              </div>
            </div>
            <!-- row -->

          </div>

          <!-- row -->
          <div v-else class="flex justify-center">
            <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
              <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">
                Статей пока нет
              </h5>
              <p class="text-gray-700 text-base mb-2">
                Но вы можете добавить)) Для этого нужно просто начать
              </p>
            </div>
          </div>
          <!-- row -->

          <Pagination :links="articles.links" />
        </div>
      </div>
    </div>
  </Body>

  <MainFooter />
</template>

<script>
import Pagination from "@/Components/Pagination.vue";
export default {
  components: {
    Pagination,
  },
};
</script>
