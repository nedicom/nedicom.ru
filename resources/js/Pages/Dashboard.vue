<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import Body from "@/Layouts/Body.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import { ref } from "vue";
import { Head } from "@inertiajs/inertia-vue3";

let title = ref("Панель управления");
</script>

<template>
  <Head title="Dashboard" />

  <MainHeader />

  <Header :ttl="title" />

  <Body>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          Вы авторизированы. Ура
        </div>
      </div>
    </div>
  </Body>

  <MainFooter />
</template>
