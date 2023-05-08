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
import { Head, Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

/*defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
});*/

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
  <Head title="Адвокат Симферополь" />

  <div class="min-h-screen">
    

    <Header :ttl="title" />

    <MainHeader />

    <Mainbanner :statusonimage="statusonimage" :nameonimage="nameonimage" />

    <Casecard :firstcardheader="firstcardheader" :firstcardbody="firstcardbody" :secondcardheader="secondcardheader" :secondcardbody="secondcardbody"
    :thirdcardheader="thirdcardheader" :thirdcardbody="thirdcardbody" :fourthcardheader="fourthcardheader" :fourthcardbody="fourthcardbody"
    :fifthcardheader="fifthcardheader" :fifthcardbody="fifthcardbody" :sixthcardheader="sixthcardheader" :sixthcardbody="sixthcardbody"/>

    <Testimonials />

    <Address />

    <Practice />

  

    <Body>
      <div class="flex h-96">
        <div class="m-auto">
          Платформа для поиска юристов, категорий дел, статей и ответов.
          <a
                    href="/yurist-po-nasledstvu"
                    class="
                      m-auto
                      mt-12                      
                      flex justify-center
                      px-5
                      py-6
                      text-sm
                      font-medium
                      text-center text-white
                      bg-blue-700
                      rounded-lg
                      focus:ring-4 focus:ring-blue-200
                      dark:focus:ring-blue-900
                      hover:bg-blue-800
                    "
                  >
                    Юрист по нследству
      </a>
        </div>
        
      </div>
    </Body>

    <MainFooter />
  </div>
</template>
