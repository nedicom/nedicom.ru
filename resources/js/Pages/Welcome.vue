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
      <div class="h-max">
        <div class="max-w-6xl mx-auto my-9 sm:px-6 lg:px-8 text-center">
          Вам больше не надо искать юриста. Все здесь.
        </div>
        <button
                    type="submit"
                    class="
                      m-auto
                      mt-12
                      w-1/4
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
                    Юрист в Вашем городе
                  </button>

        
              <button
                  type="submit"
                  class="
                    m-auto
                    my-9
                    w-1/4
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
                  Юрист онлайн  
                </button>
      </div>
    </Body>

    <MainFooter />
  </div>
</template>
