<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import Body from "@/Layouts/Body.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import { ref } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
  questions: "Array",
});

let title = ref("Вопросы");
</script>

<template>
    <Head>
    <title>{{title}}</title>
    <meta name="description" :content="questions.body" />
  </Head>

  <MainHeader />

  <Header :ttl="title" />

  <Body>
    <div class="bg-white py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div v-if="questions.total > 0" class="grid grid-cols-3 gap-9">
            <!-- card -->
            <div
              v-for="questions in questions.data"
              :key="questions.id"
              class="flex justify-center"
            >
              <div
                class="
                  block
                  min-w-full
                  p-6
                  rounded-lg
                  shadow-lg
                  bg-white
                  max-w-sm
                "
              >
                <h5
                  class="
                    text-gray-900 text-xl
                    leading-tight
                    line-clamp-1
                    font-medium
                    mb-2
                  "
                >
                  {{ questions.header }}
                </h5>
                <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                  {{ questions.body }}
                </p>
                <a
                  :href="'articles/' + questions.url"
                  class="
                    text-blue-500
                    underline
                    dark:text-blue-500
                    hover:no-underline
                  "
                  >подробнее</a
                >
              </div>
            </div>
            <!-- card -->
          </div>

          <!-- card -->
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
          <!-- card -->

          <Pagination :links="questions.links" />
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

