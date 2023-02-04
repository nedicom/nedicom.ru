<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import Body from "@/Layouts/Body.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import { ref } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";


defineProps({
  question: "$string",
});
</script>

<template>
  <Head>
    <title>{{question.title}}</title>
    <meta name="description" :content="question.body" />
  </Head>

  <MainHeader />

  <Header :ttl="question.title" />

  <Body>
    <div class="py-6 flex justify-start">
      
      <div class="xl:w-4/6 sm:px-6 lg:px-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="py-12">
            <div class="xl:w-4/6 mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 text-gray-900">{{ question.body }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="xl:w-2/6 sm:px-6 lg:px-4">
      <button
                  type="submit"
                  class="
                    m-auto
                    mt-12
                    w-1/2
                    flex justify-center
                    px-5
                    py-6
                    text-sm
                    font-medium
                    text-center text-white
                    bg-blue-700
                    rounded-lg
                    focus:ring-4 focus:ring-blue-200
                    dark:focus:ring-blue-900
                    hover:bg-blue-800
                  "
                >
                  Юрист в Вашем городе
                </button>

        
              <button
                  type="submit"
                  class="
                    m-auto
                    my-9
                    w-1/2
                    flex justify-center
                    px-5
                    py-6
                    text-sm
                    font-medium
                    text-center text-white
                    bg-blue-700
                    rounded-lg
                    focus:ring-4 focus:ring-blue-200
                    dark:focus:ring-blue-900
                    hover:bg-blue-800
                  "
                >
                  Юрист онлайн  
                </button>
      </div>
    </div>
  </Body>

  <MainFooter />
</template>


