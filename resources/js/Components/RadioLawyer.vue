<script setup>
defineProps({
  lawyers: String,
});
</script>

<template>
    <p class="mb-5 text-2xl font-semibold tracking-tight text-gray-900">Выбрать юриста для ответа</p>
    <label v-for="value in lawyers" :key="value" class="group flex item-center mb-2">
        <input type="radio" :value="value.id" name="radiolawyer" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <img :src="value.avatar_path" width="40" class="rounded-full">
        <div class="flex items-center justify-center px-1 text-sm labeldiv">{{value.name}}</div>
    </label>
</template>

<style scoped>
/* HIDE RADIO */
[type=radio] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
.labeldiv {
  cursor: pointer;
}

[type=radio] + img {
  cursor: pointer;
}

/* CHECKED STYLES */
[type=radio]:checked + img {
  outline: 2px solid gray;
}
</style>