<script setup>
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import Modal from '@/Components/Modal.vue';

const props = defineProps({
    firstcardheader: String,
    firstcardbody: String,
    secondcardheader: String,
    secondcardbody: String,
    thirdcardheader: String,
    thirdcardbody: String,
});

let form = reactive({
  phone: "",
});

let ModalBtnText = 'Подробнее';

let submit = () => {
  Inertia.post("/phone/send", form);
}
</script>

<template>
<!-- case card -->   
       <h1 class="text-4xl font-semibold text-grey text-center py-10">
        Дела, по которым мы помогаем
      </h1>
      <div class="max-w-6xl mx-auto md:my-9 sm:px-6 lg:px-8 text-center">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-9">
            <!-- card -->
            <div class="flex justify-center m-3 md:m-0">
              <div class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium mb-2">
                  {{ firstcardheader }}
                </h5>
                <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                  {{ firstcardbody }}
                </p>
                <Modal :ModalBtnText="ModalBtnText"/> 
              </div>
            </div>
            <!-- card -->

            <!-- card -->
            <div class="flex justify-center m-3 md:m-0">
              <div class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium mb-2">
                  {{ secondcardheader }}
                </h5>
                <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                  {{ secondcardbody }}
                </p>
                <Modal :ModalBtnText="ModalBtnText"/> 
              </div>
            </div>
            <!-- card -->

            <!-- card -->
            <div class="flex justify-center m-3 md:m-0">
              <div class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium mb-2">
                  {{ thirdcardheader }}
                </h5>
                <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                  {{ thirdcardbody }}
                </p>
                <Modal :ModalBtnText="ModalBtnText"/> 
              </div>
            </div>
            <!-- card -->
            
        </div>
      </div>

      <div class="flex justify-center m-3">
        <a href = "/uslugi" 
          class="text-lg text-blue-700 hover:underline dark:text-blue-500">
          Полный перечень услуг</a>
        </div>
       <!-- case card -->
       
</template> 