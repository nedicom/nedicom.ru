<script setup>
const props = defineProps({
    practice: "Array",
});
</script>

<template>
<!-- case card -->   
       <h1 class="text-4xl font-semibold text-grey text-center py-10">
        Практика юриста
      </h1>

      <div class="max-w-6xl mx-auto md:my-9 sm:px-6 lg:px-8 text-center">
        
        <div  class="grid grid-cols-3 gap-9">

    <!-- card -->
                <div
                v-for="one in practice"
                :key="one.id"
                class="flex justify-center"
                >
                <div
                    class="
                    block
                    min-w-full
                    p-6
                    rounded-lg
                    shadow-lg
                    bg-white
                    max-w-sm
                    "
                >
            <h5
            class="
                text-gray-900 text-xl
                leading-tight
                line-clamp-1
                font-medium
                mb-2
            "
            >
            {{ one.header }}
            </h5>
            <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
            {{ one.description }}
            </p>
            <a
            :href="'/articles/' + one.url"
            class="
                text-blue-500
                underline
                dark:text-blue-500
                hover:no-underline
            "
            >подробнее</a
            >
        </div>
        </div>
    <!-- card -->
    </div>


    </div>
    <!-- case card -->
</template> 