<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import Mainbanner from "@/Layouts/Mainbanner.vue";
import Specialization from "@/Layouts/Specialization.vue";
import Slider from "@/Layouts/Slider.vue";
import Articles from "@/Layouts/Articles.vue";
import About from "@/Layouts/About.vue";
import Address from "@/Layouts/Address.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

/*defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
});*/

let sliderheader = ref("Практика юриста");

let set = defineProps({
  lawyer: "$string",
  specializationOne: "$string",
  specializationTwo: "$string",
  specializationThree: "$string",
  articles: "$Array",
  practice: "$Array",
});

let screen = window.innerWidth;

let mainbannerimg;
  if (screen>1919){
    mainbannerimg = ref(`/${set.lawyer.file_path}`);
    }
    else if(screen>600){
      mainbannerimg = ref(`/${set.lawyer.file_path}`);
    }
    else{
      mainbannerimg = ref(`/${set.lawyer.file_path}`);
    };

let title = ref(set.lawyer.name);

</script>

<template>
  <Head title="Адвокат Симферополь" />

  <div class="min-h-screen">
    
    <MainHeader />

    <Header :ttl="title" />  

    <Mainbanner :statusonimage="statusonimage" :nameonimage="set.lawyer.name" :mainbannerimg="mainbannerimg"/>

    <Address />

    <About :about="set.lawyer.about"/>

    <Specialization v-if="specializationOne"
      :firstcardheader="specializationOne.usl_name" 
      :firstcardbody="specializationOne.usl_desc" 
      :secondcardheader="specializationTwo.usl_name" 
      :secondcardbody="specializationTwo.usl_desc"   
      :thirdcardheader="specializationThree.usl_name" 
      :thirdcardbody="specializationThree.usl_desc"/>

    <Articles :articles = "articles"/>

    <Slider :sliderheader="sliderheader" :sldimg="practice" />
    
    <MainFooter />
    
  </div>
</template>


