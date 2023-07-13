<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";

import Mainbanner from "@/Layouts/Mainbanner.vue";
import Body from "@/Layouts/Body.vue";
import Sidebaraction from "@/Layouts/Sidebaraction.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import Modal from '@/Components/Modal.vue';
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

let vars = defineProps({
  usluga: String,
  user: String,
  firstlawyer: String,
});


let mainbannerimg = ref("/storage/images/landing/main/1280on600.webp");

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

  <Header :phone="usluga.phone" :address="usluga.address" />

  <Mainbanner :statusonimage="usluga.usl_name" :nameonimage="nameonimage" :mainbannerimg="mainbannerimg"/>

  <Body>

    <div class="py-6">

          <div class="max-w-5xl py-12 mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">        
            <div v-if="user" >
              <div v-if="vars.user.id == 1" >
                <a :href="route('uslugi.edit', usluga.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Редактировать</a>
              </div>
            </div>
            <div class="px-6 text-gray-900">{{ usluga.usl_desc }}</div>           
          </div>
        
      


      <h1 class="text-4xl font-semibold text-grey text-center py-10"> Юристы в этой категории </h1>
      <div class="grid grid-cols-3 gap-4 place-content-around px-4"> 
        
        <div v-if="firstlawyer" class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a :href="route('lawyer', firstlawyer.id)">
                <img class="rounded-t-lg" :src="'/'+firstlawyer.file_path" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ firstlawyer.name }}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                  {{firstlawyer.about}}
                </p>
                <a :href="route('lawyer', firstlawyer.id)" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Про юриста
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>

        <div v-if="firstlawyer" class=" bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a :href="route('lawyer', firstlawyer.id)">
                <img class="rounded-t-lg" :src="'/'+firstlawyer.file_path" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ firstlawyer.name }}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                  {{firstlawyer.about}}
                </p>
                <a :href="route('lawyer', firstlawyer.id)" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Про юриста
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>

        <div v-if="firstlawyer" class=" bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a :href="route('lawyer', firstlawyer.id)">
                <img class="rounded-t-lg" :src="'/'+firstlawyer.file_path" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ firstlawyer.name }}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                  {{firstlawyer.about}}
                </p>
                <a :href="route('lawyer', firstlawyer.id)" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Про юриста
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>

      </div>

      
      
    </div>
  </Body>

  <MainFooter />
</template>

