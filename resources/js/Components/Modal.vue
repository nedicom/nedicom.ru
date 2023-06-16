<script setup lang="ts">
import { ModalsContainer, useModal } from 'vue-final-modal'
import ModalConfirm from './ModalConfirm.vue'
const { open, close } = useModal({
  component: ModalConfirm,
  attrs: {
    title: 'Hello World!',
    onConfirm() {
      close()
    },
  },
  slots: {
    default: '<p>UseModal: The content of the modal</p>',
  },
})
</script>

<template>
  <VButton 
  @click="() => open()"
  class="
        m-auto
        w-1/2
        outline
        flex justify-center
        px-5
        py-2
        text-md
        font-medium
        text-center text-white
        bg-blue-700
        rounded-lg
        focus:ring-4 focus:ring-blue-200
        dark:focus:ring-blue-900
        hover:bg-blue-800
        cursor-grab
        ">
    связаться
</VButton>

  <ModalsContainer />
</template>
