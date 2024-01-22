<script setup>
defineProps({
  question: String,
});
</script>
<template>
  <div class="flex justify-end">
    <div
      class="w-auto inline-block rounded-l-lg rounded-b-lg bg-green-200 my-1 mr-1 ml-14 pt-1 px-2"
    >
      <div class="grid grid-cols-1 content-end">
        <div class="text-sm font-normal text-gray-900">
          {{ question }}
        </div>
        <div class="text-xxs text-gray-500 text-right">сегодня</div>
      </div>
    </div>
  </div>
</template>