<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import Mainbanner from "@/Layouts/Mainbanner.vue";
import Casecard from "@/Layouts/Casecard.vue";
import Testimonials from "@/Layouts/Testimonials.vue";
import Slider from "@/Layouts/Slider.vue";
import Address from "@/Layouts/Address.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

/*defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
});*/

let screen = window.innerWidth;

let sliderheader = ref("Наша практика говорит за нас");

let sldimg = ref([{id:1, practice_file_path : "storage/images/landing/main/slider/1.png"}, 
                  {id:2, practice_file_path : "storage/images/landing/main/slider/2.png"}, 
                  {id:3, practice_file_path : "storage/images/landing/main/slider/3.JPEG"},                  
                  ]);

let mainbannerimg;
  if (screen>1919){
    mainbannerimg = ref("/storage/images/landing/main/all1920on600.png");
    }
    else if(screen>600){
      mainbannerimg = ref("/storage/images/landing/main/all1280on600.png");
    }
    else{
      mainbannerimg = ref("/storage/images/landing/main/all1600on900.jpg");
    };


let title = ref("Главная");

let statusonimage = ref("Адвокатский кабинет");
let nameonimage = ref("Мина Марк Анатольевич");

let firstcardheader = ref("Наследственные дела");
let firstcardbody = ref("Оспаривание дарственных, завещаний, признание права в порядке наследования");
let secondcardheader = ref("Семейные споры");
let secondcardbody = ref("Раздел имущества, признание личной собственностью, установление отцовства, порядок общения, алименты");
let thirdcardheader = ref("Юрдическое обслуживание");
let thirdcardbody = ref("Сопровождение и защита бизнеса от уголовной, налоговой и корпоративных споров до проверки контрагентов и ");
</script>

<template>
  <Head title="Адвокат Симферополь" />

  <div class="min-h-screen">
    
    <MainHeader />

    <Header :ttl="title" />    

    <Mainbanner :statusonimage="statusonimage" :nameonimage="nameonimage" :mainbannerimg="mainbannerimg"/>
   
    <Address />

    <Testimonials />

    <Casecard :firstcardheader="firstcardheader" :firstcardbody="firstcardbody" :secondcardheader="secondcardheader" :secondcardbody="secondcardbody"
    :thirdcardheader="thirdcardheader" :thirdcardbody="thirdcardbody" :fourthcardheader="fourthcardheader" :fourthcardbody="fourthcardbody"
    :fifthcardheader="fifthcardheader" :fifthcardbody="fifthcardbody" :sixthcardheader="sixthcardheader" :sixthcardbody="sixthcardbody"/>

    <Slider :sldimg="sldimg" :sliderheader="sliderheader"/>

    <MainFooter />
  
  </div>
</template>
