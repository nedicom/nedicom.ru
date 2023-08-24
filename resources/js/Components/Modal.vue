<script setup lang="ts">
import { ModalsContainer, useModal } from 'vue-final-modal'
import ModalConfirm from './ModalConfirm.vue'
const { open, close } = useModal({
  component: ModalConfirm,
  attrs: {
    test: 'Hello World!',
    onConfirm() {
      close()
    },
  },
  slots: {
    default: '<p>UseModal: The content of the modal</p>',
  },
})
const props = defineProps({
    ModalBtnText: String,
});
</script>

<template>
  <VButton 
  @click="() => open()"
  class="
        mx-5
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
        {{ModalBtnText}}    
  </VButton>

  <ModalsContainer />
</template>
