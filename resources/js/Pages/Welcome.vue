<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import Body from "@/Layouts/Body.vue";
import Mainbanner from "@/Layouts/Mainbanner.vue";
import Casecard from "@/Layouts/Casecard.vue";
import Testimonials from "@/Layouts/Testimonials.vue";
import Practice from "@/Layouts/Practice.vue";
import Address from "@/Layouts/Address.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import {Head, Link} from "@inertiajs/inertia-vue3";
import {ref} from "vue";

/*defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
});*/
let screen = window.innerWidth;

let mainbannerimg;
if (screen > 1919) {
    mainbannerimg = ref("/storage/images/landing/main/all1920on600.jpg");
} else if (screen > 600) {
    mainbannerimg = ref("/storage/images/landing/main/all1280on800.jpg");
} else {
    mainbannerimg = ref("/storage/images/landing/main/all1600on900.jpg");
}
;


let title = ref("Главная");

let statusonimage = ref("Адвокатский кабинет");
let nameonimage = ref("Мина Марк Анатольевич");


let firstcardheader = ref("Наследственные дела");
let firstcardbody = ref("Оспаривание дарственных, завещаний, признание права в порядке наследования");
let secondcardheader = ref("Семейные споры");
let secondcardbody = ref("Раздел имущества, признание личной собственностью, установление отцовства, порядок общения, алименты");
let thirdcardheader = ref("Юрдическое обслуживание");
let thirdcardbody = ref("Сопровождение и защита бизнеса от уголовной, налоговой и корпоративных споров до проверки контрагентов и ");
let fourthcardheader = ref("Пенсионные споры");
let fourthcardbody = ref("Если не назначили пенсию или платят меньше, чем должны. Признание права на трудовой стаж, перерасчет, расчет");
let fifthcardheader = ref("Имущественные споры");
let fifthcardbody = ref("Сносы, сохранение в реконструированном виде, установление границ участков, перераспредление участков, признание прав");
let sixthcardheader = ref("Все остальные");
let sixthcardbody = ref("Если Вашего дела нет в списке, это не значит, что мы таким не занимаемся. Мы поможем в большинстве случаев");


</script>


<template>
    <Head title="Адвокат Симферополь"/>

    <div class="min-h-screen">

        <MainHeader/>

        <Header :ttl="title"/>

        <Mainbanner :statusonimage="statusonimage" :nameonimage="nameonimage" :mainbannerimg="mainbannerimg"/>

        <Address/>

        <Testimonials/>

        <Casecard :firstcardheader="firstcardheader" :firstcardbody="firstcardbody" :secondcardheader="secondcardheader"
                  :secondcardbody="secondcardbody"
                  :thirdcardheader="thirdcardheader" :thirdcardbody="thirdcardbody" :fourthcardheader="fourthcardheader"
                  :fourthcardbody="fourthcardbody"
                  :fifthcardheader="fifthcardheader" :fifthcardbody="fifthcardbody" :sixthcardheader="sixthcardheader"
                  :sixthcardbody="sixthcardbody"/>

        <Practice/>

        <MainFooter/>

    </div>
</template>
