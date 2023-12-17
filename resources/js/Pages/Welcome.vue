<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import Mainbanner from "@/Layouts/Mainbanner.vue";
import Testimonials from "@/Layouts/Testimonials.vue";
import Slider from "@/Layouts/Slider.vue";
import SliderUslug from "@/Layouts/SliderUslug.vue";
import Address from "@/Layouts/Address.vue";
//import VK from "@/Layouts/Vk.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import FlashMessage from "@/Components/FlashMessage.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

defineProps({
    flash: Object,
    uslugi: String,
    uslugislider: String,
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
let sldimg = ref([
    { id: 1, practice_file_path: "/storage/images/landing/main/slider/1.webp" },
    { id: 2, practice_file_path: "/storage/images/landing/main/slider/2.webp" },
    { id: 3, practice_file_path: "/storage/images/landing/main/slider/3.webp" },
    { id: 4, practice_file_path: "/storage/images/landing/main/slider/4.webp" },
]);

let title = ref("Главная");
let statusonimage = ref("Адвокатский кабинет");
let nameonimage = ref("Мина");
</script>

<template>
    <FlashMessage :message="flash.message" />

    <Head title="Адвокатский кабинет Мина" />

    <div class="min-h-screen">
        <MainHeader />

        <Header :ttl="title" />

        <Mainbanner
            :statusonimage="statusonimage"
            :nameonimage="nameonimage"
            :mainbannerimg="mainbannerimg"
        />

        <Slider :sldimg="sldimg" :sliderheader="'В нашей копилке сотни дел, но каждое новое дело для нас особенное'" />

        <Testimonials />

        <Address />

        <SliderUslug
            :uslugislider="[1,2,3,4,5,6,7]"
            :sliderheader="'Дела, по которым мы помагаем'"
        />

        <!--<VK />-->

        <MainFooter />
    </div>
</template>
