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
    <meta name="description" content="вопросы" />
    </Head>

  <MainHeader />

  <Header :ttl="title" />

  <Body>
    <div class="bg-white py-12 ">

        <div v-if="questions.total > 0" class="grid grid-cols-3 gap-9 m-5">    
          <!-- card -->
          <div
            v-for="question in questions.data"
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
              <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                {{ question.body }}
                
              </p>
              <a
                :href="route('questions.url', question.url)"
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

          <Pagination :links="questions.links" />

      

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

