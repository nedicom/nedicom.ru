<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import Body from "@/Layouts/Body.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import { ref } from "vue";

/*defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
});*/

let title = ref("Главная");
</script>

<template>
  <Head title="Добавить статью" />

  <div class="min-h-screen">
    <MainHeader />

    <Header :ttl="title" />

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
