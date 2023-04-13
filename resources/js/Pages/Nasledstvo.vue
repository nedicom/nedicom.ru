<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import Body from "@/Layouts/Body.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import Sidebaraction from "@/Layouts/Sidebaraction.vue";
import Modalbutton from '@/Components/Modalbutton.vue';
import Modalformback from '@/Components/Modalformback.vue';
import { ref } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

let title = ref("Юрист по наследству");
</script>

<template>
    <Head>
      <title>Юрист по наследству</title>
    </Head>
  
    
    <MainHeader />

    <Header :ttl="title" />

    <Body>

      <div class="h-max">
        фото юриста с текстом и формой обратной связи
      </div>

      <div class="max-w-6xl mx-auto my-9 sm:px-6 lg:px-8 text-center">
        <div class="grid grid-cols-3 gap-9">
            <!-- card -->
            <div class="flex justify-center">
              <div class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium mb-2">
                  оспаривание наследства
                </h5>
                <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                  Оспаривание завещаний, дарственных, других договоров по мотивам заблуждения завещателя, нарушения процедуры, болезни и т.д.
                </p>
                <Modalbutton />
              </div>
            </div>
            <!-- card -->

            <!-- card -->
            <div class="flex justify-center">
              <div class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium mb-2">
                  оформление недвижимости
                </h5>
                <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                  Если умерший не успел оформить самострой, потерял документы или не оформил аправа при жизни
                </p>
                <Modalbutton />
              </div>
            </div>
            <!-- card -->

            <!-- card -->
            <div class="flex justify-center">
              <div class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium mb-2">
                  установление родства
                </h5>
                <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                  Подтверждение факта родственных отношений для оформления наследства независимо от дальности родства
                </p>
                <Modalbutton />
              </div>
            </div>
            <!-- card -->

            <!-- card -->
            <div class="flex justify-center">
              <div class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium mb-2">
                  Оформление отношений
                </h5>
                <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                  При жизни 
                </p>
                <Modalbutton />
              </div>
            </div>
            <!-- card -->

            <!-- card -->
            <div class="flex justify-center">
              <div class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium mb-2">
                  оспаривание завещания
                </h5>
                <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                  По мотивам заблуждения завещателя, нарушения процедуры, болезни и т.д.
                </p>
                <Modalbutton />
              </div>
            </div>
            <!-- card -->

            <!-- card -->
            <div class="flex justify-center">
              <div class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium mb-2">
                  оспаривание завещания
                </h5>
                <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                  По мотивам заблуждения завещателя, нарушения процедуры, болезни и т.д.
                </p>
                <Modalbutton />
              </div>
            </div>
            <!-- card -->
        </div>
      </div>

      <div class="h-max">
        судебная практика
      </div>

      <div class="h-max">
        отзывы
      </div>

    </Body>

  
  
  <Modalformback />
  
  <MainFooter />
  
</template>
