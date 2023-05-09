<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import Body from "@/Layouts/Body.vue";
import Sidebaraction from "@/Layouts/Sidebaraction.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import Modal from '@/Components/Modal.vue';
import TailwindModal from '@/Components/TailwindModal.vue';
import { ref } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";


defineProps({
  article: String,
});
</script>
<style>
.article h3{
  font-size: 2rem;
}
</style>

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
                <div class="px-6 text-gray-900 article" v-html="article.body"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      
      
    </div>
  </Body>

  <Sidebaraction />
  <TailwindModal />
  <Modal />
  <MainFooter />
</template>


