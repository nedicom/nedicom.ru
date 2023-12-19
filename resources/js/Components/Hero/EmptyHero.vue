<script setup>
defineProps({
  header: String,
  body: String,
  btn: String,
  btnroute: String,
});
</script>

<template>
  <div class="grid grid-cols-1 content-center justify-items-center h-96">
    <div class="block p-6 bg-white max-w-sm text-center">
      <p class="text-gray-900 text-lg font-bold mb-2">{{ header }}</p>
      <p class="text-gray-600 text-lg mb-6">{{ body }}</p>
      <a
        :href="route(btnroute)"
        class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
        >{{ btn }}
        <svg
          class="hidden w-3 h-3 ml-2 xl:inline"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 14 10"
        >
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M1 5h12m0 0L9 1m4 4L9 9"
          ></path></svg
      ></a>
    </div>
  </div>
</template>