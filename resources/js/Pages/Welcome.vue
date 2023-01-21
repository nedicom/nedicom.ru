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

<div class="h-screen">
  <MainHeader />

  <Header :ttl="title" />

  <Body>
    <div
      class="
        relative
        flex
        items-top
        justify-center
        h-full
        bg-gray-100
        dark:bg-gray-900
        sm:items-center sm:pt-0
      "
    >
      <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        Вам больше не надо искать юриста. Все здесь.
      </div>
    </div>
  </Body>

  <MainFooter />
  </div>
</template>
