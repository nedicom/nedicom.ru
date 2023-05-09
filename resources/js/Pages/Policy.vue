<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import { Head } from "@inertiajs/inertia-vue3";

</script>

<template>
  <Head>  
    <title>Политика использования персональных данных</title>
    <meta name="description" content="Правовая информация" />
  </Head>

    <div class="h-screen">
    
        <MainHeader />

        <Header ttl="Политика использования персональных данных" />    

        <div class>
            Политика использования персональных данных
        </div>

        <MainFooter />
    </div>
  
</template>
