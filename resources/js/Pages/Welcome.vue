<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import Mainbanner from "@/Layouts/Mainbanner.vue";
import Casecard from "@/Layouts/Casecard.vue";
import Testimonials from "@/Layouts/Testimonials.vue";
import Slider from "@/Layouts/Slider.vue";
import Address from "@/Layouts/Address.vue";
//import VK from "@/Layouts/Vk.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import FlashMessage from "@/Components/FlashMessage.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

defineProps({
  flash: Object,
});

  //let screen = window.innerWidth;
let mainbannerimg = ref("/storage/images/landing/main/1280on600.webp");
  /*
  if(screen > 1024){
      mainbannerimg = ref("/storage/images/landing/main/1280on600.webp");
    }
    else{
      mainbannerimg = ref("/storage/images/landing/main/main600.webp");
    }
  */
let sliderheader = ref("В нашей копилке сотни дел, но каждое новое дело для нас особенное");

let sldimg = ref([{id:1, practice_file_path : "storage/images/landing/main/slider/1.webp"}, 
                  {id:2, practice_file_path : "storage/images/landing/main/slider/2.webp"}, 
                  {id:3, practice_file_path : "storage/images/landing/main/slider/3.webp"},
                  {id:4, practice_file_path : "storage/images/landing/main/slider/4.webp"},                   
                  ]);

let title = ref("Главная");

let statusonimage = ref("Адвокатский кабинет");
let nameonimage = ref("Мина");

let firstcardheader = ref("Наследственные дела");
let firstcardbody = ref("Оспаривание дарственных, завещаний, признание права в порядке наследования");
let secondcardheader = ref("Семейные споры");
let secondcardbody = ref("Раздел имущества, признание личной собственностью, установление отцовства, порядок общения, алименты");
let thirdcardheader = ref("Юридическое обслуживание");
let thirdcardbody = ref("Сопровождение и защита бизнеса от уголовной, налоговой и корпоративных споров до проверки контрагентов и ");
</script>

<template>
  <FlashMessage :message="flash.message"/>
  
  <Head title="Адвокатский кабинет Мина" />

  <div class="min-h-screen">
    
    <MainHeader />

    <Header :ttl="title" />    

    <Mainbanner :statusonimage="statusonimage" :nameonimage="nameonimage" :mainbannerimg="mainbannerimg"/>
   
    <Slider :sldimg="sldimg" :sliderheader="sliderheader"/>
    
    <Testimonials />

    <Address />

    <Casecard :firstcardheader="firstcardheader" :firstcardbody="firstcardbody" :secondcardheader="secondcardheader" :secondcardbody="secondcardbody"
    :thirdcardheader="thirdcardheader" :thirdcardbody="thirdcardbody" />

    <!--<VK />-->

    <MainFooter />
  
  </div>
</template>
