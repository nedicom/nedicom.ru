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


let vars = defineProps({
  usluga: String,
  user: String,
});
</script>


<style>
.article h3{
  font-size: 2rem;
}
.article ul,
  ol {
    padding: 0 1rem;
    margin-left: 1rem;
    list-style-type: square;
  }
</style>

<template>
  <Head>
    <title>{{usluga.usl_name}}</title>
    <meta name="description" :content="usluga.usl_desc" />
  </Head>

  <MainHeader />

  <Header :ttl="usluga.usl_name" />

  <Body>
    <div class="py-6 flex justify-start">

      <div class="max-w-5xl sm:px-6 lg:px-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
              
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div v-if="vars.user.id == 1" >
                  <a :href="route('uslugi.edit', usluga.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Редактировать</a>
                </div>

                <div class="px-6 text-gray-900">{{ usluga.usl_desc }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      
      
    </div>
  </Body>

  <MainFooter />
</template>

