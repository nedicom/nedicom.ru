<script setup>
defineProps({
  my: "Array",
});
</script>

<template>
  <div class="flex justify-center">
    <div
      class="grid grid-cols-1 md:grid-cols-2 w-full m-5 md:m-0 md:w-2/3 gap-4 ntent-start"
    >
      <div
        v-for="key in my"
        :key="key"
        class="p-6 rounded-lg shadow-lg bg-white"
      >
        <div class="flex justify-end px-4 pt-4"></div>
        <div class="flex flex-col items-center pb-10">
          <div class="w-24 h-24 mb-3 rounded-full shadow-lg">
            <svg
              aria-hidden="true"
              class="p-5"
              fill="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path fill-rule="evenodd" :d="key[4]" clip-rule="evenodd"></path>
            </svg>
          </div>
          <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
            <a :href="key[2]" class="no-underline hover:underline">{{
              key[1]
            }}</a>
          </h5>
          <span class="text-sm text-center text-gray-500 dark:text-gray-400">{{ key[5] }}</span>
          <div class="flex mt-1 md:mt-6">
            <a
              :href="key[3]"
              class="mx-1 inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              >Добавить</a
            >
            <a
              :href="key[2]"
              class="mx-1 inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 ms-3"
              >Всего <span v-if="key[0]" class="mx-1">{{ key[0] }}</span
              ><span v-else class="mx-1">0</span></a
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>