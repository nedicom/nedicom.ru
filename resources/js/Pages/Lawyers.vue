<script setup>
import { ref } from "vue";
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import Body from "@/Layouts/Body.vue";
import MainFooter from "@/Layouts/MainFooter.vue";

const title = ref("Юристы");
</script>

<template>
  <Head title="Lawyers" />
  
  <div class="min-h-screen">
    <MainHeader />

    <Header :ttl="title" />

    <Body>
      <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">222</div>
        </div>
      </div>
    </Body>

    <MainFooter />
  </div>
</template>

