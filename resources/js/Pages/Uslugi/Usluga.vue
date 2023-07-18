<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";

import Mainbanner from "@/Layouts/Mainbanner.vue";
import Body from "@/Layouts/Body.vue";

import Address from "@/Layouts/Address.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import Slider from "@/Layouts/Slider.vue";
import { Head, ref } from "@inertiajs/inertia-vue3";

let vars = defineProps({
  usluga: String,
  user: String,
  lawyers: String,
  firstlawyer: String,
  practice: "$Array",
});

let sliderheader = "Доверяйте нашей практике";
  
let mainbannerimg = '/'+vars.lawyers[0]?.file_path;

if(vars.lawyers[0]?.file_path === undefined){
    mainbannerimg  = '/storage/images/landing/main/1280on600.webp';
}
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
          <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">        
            <div v-if="user" >
              <div v-if="vars.user.id == 1" >
                <a :href="route('uslugi.edit', usluga.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Редактировать</a>
              </div>
            </div>                    
          </div>

          <div class="px-6 text-gray-900 text-center">{{ usluga.usl_desc }}</div>

          <h2 class="my-6 py-6 text-3xl font-semibold text-grey text-center">{{ usluga.preimushestvo1 }}</h2>
          <h2 class="my-6 py-6 text-3xl font-semibold text-grey text-center">{{ usluga.preimushestvo2 }}</h2>
          <h2 class="my-6 py-6 text-3xl font-semibold text-grey text-center">{{ usluga.preimushestvo3 }}</h2>

          <div class="px-6 text-gray-900 text-center">{{ usluga.longdescription }}</div>   
        
          <Address :phone="usluga.phone" :address="usluga.address" />

          <!--lawyers-->
          <div v-if="lawyers != 0" >
            <h1 class="text-4xl font-semibold text-grey text-center py-10"> Юристы в этой категории </h1>          
            
            <div class="">   
            
              <div class="grid md:grid-cols-3 gap-4 mx-4">   
                <div v-for="item in lawyers" class="">           
                  <div >
                    <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                      <a :href="route('lawyer', item.id)">
                          <img class="rounded-t-lg" :src="'/'+item?.file_path" alt="" />
                      </a>
                      <div class="p-5">
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{item.about}}
                          </p>
                              <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ item.name }}</h5>
                      </div>
                    </div>  
                  </div>
                </div>
              </div>
            </div>  
          </div>
          <!--lawyers-->

        <Slider v-if="practice != 0" :sliderheader="sliderheader" :sldimg="practice" />
      
    </div>
  </Body>

  <MainFooter />
</template>

