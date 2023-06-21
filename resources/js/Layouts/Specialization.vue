<script setup>
const props = defineProps({
    specializationOne: Array,
    specializationTwo: Array,
    specializationThree: Array,
});

</script>

<template>
<!-- case card -->   
       <h1 class="text-4xl font-semibold text-grey text-center py-10">
        Специализация юриста
      </h1>

      <div class="max-w-6xl mx-auto md:my-9 sm:px-6 lg:px-8 text-center">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-9">

            <!-- card -->
            <div v-if="specializationOne" class="flex justify-center m-3 md:m-0">
              <div class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium mb-2">
                  {{ specializationOne.usl_name  }}
                </h5>
                <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                  {{ specializationOne.usl_desc }}
                </p>                
              </div>
            </div>
            <div v-else class="flex justify-center m-3 md:m-0">
              <div class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium mb-2">
                 
                </h5>
                <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                  Юрист еще не выбрал основную специализацию
                </p>                
              </div>
            </div>
            <!-- card -->

            <!-- card -->
            <div v-if="specializationTwo" class="flex justify-center m-3 md:m-0">
              <div class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium mb-2">
                  {{ specializationTwo.usl_name  }}
                </h5>
                <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                  {{ specializationTwo.usl_desc }}
                </p>
              </div>
            </div>
            <div v-else class="flex justify-center m-3 md:m-0">
              <div class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium mb-2">
                 
                </h5>
                <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                  Юрист еще не выбрал вторую специализацию
                </p>                
              </div>
            </div>
            <!-- card -->

            <!-- card -->
            <div v-if="specializationThree" class="flex justify-center m-3 md:m-0">
              <div class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium mb-2">
                  {{ specializationThree.usl_name }}
                </h5>
                <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                  {{ specializationThree.usl_desc }}
                </p>
              </div>
            </div>
            <div v-else class="flex justify-center m-3 md:m-0">
              <div class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <h5 class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium mb-2">
                 
                </h5>
                <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                  Юрист еще не выбрал третью специализацию
                </p>                
              </div>
            </div>
            <!-- card -->
           
        </div>
      </div>
       <!-- case card -->
</template> 