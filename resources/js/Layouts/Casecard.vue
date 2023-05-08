<script setup>
import { reactive } from "vue";
import Modalbutton from '@/Components/Modalbutton.vue';
import Modalformback from '@/Components/Modalformback.vue';
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    firstcardheader: String,
    firstcardbody: String,
    secondcardheader: String,
    secondcardbody: String,
    thirdcardheader: String,
    thirdcardbody: String,
    fourthcardheader: String,
    fourthcardbody: String,
    fifthcardheader: String,
    fifthcardbody: String,
    sixthcardheader: String,
    sixthcardbody: String,
});

let form = reactive({
  phone: "",
});

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
                <Modalbutton />
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
                <Modalbutton />
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
                <Modalbutton />
              </div>
            </div>
            <!-- card -->

            <!-- card -->
            <div class="flex justify-center m-3 md:m-0">
              <div class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium mb-2">
                  {{ fourthcardheader }}
                </h5>
                <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                  {{ fourthcardbody }}
                </p>
                <Modalbutton />
              </div>
            </div>
            <!-- card -->

            <!-- card -->
            <div class="flex justify-center m-3 md:m-0">
              <div class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium mb-2">
                  {{ fifthcardheader }}
                </h5>
                <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                  {{ fifthcardbody }}
                </p>
                <Modalbutton />
              </div>
            </div>
            <!-- card -->

            <!-- card -->
            <div class="flex justify-center m-3 md:m-0">
              <div class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium mb-2">
                  {{ sixthcardheader }}
                </h5>
                <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                  {{ sixthcardbody }}
                </p>
                <Modalbutton />
              </div>
            </div>
            <!-- card -->
        </div>
      </div>
       <!-- case card -->
       <Modalformback />
</template> 