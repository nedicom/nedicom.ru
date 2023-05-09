<script setup>
const props = defineProps({
  ttl: String,
});
</script>

    
<template >
  <!-- Page Heading -->
  <header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight grid gap-4 md:grid-cols-3 text-center">
        <div>{{ ttl }}</div> 
        <div><a href="#address">Респ. Крым, г. Симферополь, ул. Долгоруковская, 7</a></div> 
        <div> <a href="tel:+79788838978">+7 978 8838 978</a></div>
      </h2>
    </div>
  </header>
</template>