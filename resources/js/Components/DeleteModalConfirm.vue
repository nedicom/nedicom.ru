<script setup lang="ts">
import { VueFinalModal } from 'vue-final-modal';
import { reactive } from "vue";

defineProps<{
  title?: string,
  id?: number,
}>()

const emit = defineEmits<{
  (e: 'confirm'): void,
  (e: 'close'): void,
}>()
</script>

<template>
<VueFinalModal
    class="flex justify-center items-center"
    content-class="flex flex-col max-w-xl mx-4 p-4 bg-white dark:bg-gray-900 border dark:border-gray-700 rounded-lg space-y-2"
>
<div class="relative">
    <button type="button" 
        @click="emit('close')"
        class="absolute top-0 right-0 bg-white rounded-md p-2 inline-flex items-end justify-end text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
              <span class="sr-only">Close menu</span>
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
    </button>
</div>
<div class="px-6 py-6 lg:px-8">
    <div class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Вы действительно хотите удалить {{ title }}?</div>
    <div class="space-y-6">
        <div class="flex justify-between">
            <button @click="handleConfirm" type="submit" class="w-full mr-5 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Удалить</button>
            <button @click="emit('close')" type="submit" class="w-full ml-5 text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Отменить</button>
        </div>
    </div>
</div>
</VueFinalModal>
</template>

<script lang="ts">
    export default {
        methods: {
            handleConfirm() {
                this.$emit('confirm', this.id)
            }
        }
    }
</script>
