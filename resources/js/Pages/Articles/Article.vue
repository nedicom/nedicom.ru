<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import Body from "@/Layouts/Body.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import { ref } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";


defineProps({
  article: "$string",
});
</script>

<template>
  <Head>
    <title>{{article.header}}</title>
    <meta name="description" :content="article.body" />
  </Head>

  <MainHeader />

  <Header :ttl="article.header" />

  <Body>
    <div class="py-6 flex justify-start">
      <div class="max-w-5xl sm:px-6 lg:px-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="py-12">
            <div class="xl:w-4/6 mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 text-gray-900">{{ article.body }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="xl:w-2/6 sm:px-6 lg:px-4">
        <button class="py-12">Найти юриста по этой теме</button>
        <div class="py-12">Спросить онлайн по этой теме</div>
      </div>
    </div>
  </Body>

  <MainFooter />
</template>


