<script setup>
defineProps({
  answer: String,
});
</script>
<template>
  <div class="flex justify-start pr-5">
    <div class="w-10 grid grid-col-1 mr-1 content-end">
      <img
        class="w-8 h-8 rounded-full"
        src="https://nedicom.ru/storage/usr/94/avatar/1706103130avatar.webp"
        alt="онлайн юрист"
      />
    </div>

    <div
      class="w-full inline-block rounded-r-lg rounded-t-lg bg-white my-1 mr-5 pt-2 px-2"
    >
      <div class="text-xs font-semibold text-green-500">Андрей Дмитриевич</div>

      <div class="">
        <div class="grid grid-cols-1 content-end">
          <div class="text-sm font-normal text-gray-900">
            {{ answer }} <slot />
          </div>
          <div class="text-xxs text-gray-500 text-right">сегодня</div>
        </div>
      </div>
    </div>
  </div>
</template>