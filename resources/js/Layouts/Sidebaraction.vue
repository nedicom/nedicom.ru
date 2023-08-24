<script setup>
import Modal from '@/Components/Modal.vue';

defineProps({
    ModalBtnText: String,
});
</script>

<template>
  <div class="md:w-2/6 md:mb-12 w-full sm:px-6 lg:px-4 fixed bottom-0 right-0 z-40 h-16 mb-5">
    <Modal :ModalBtnText="ModalBtnText"/>
  </div>
</template>