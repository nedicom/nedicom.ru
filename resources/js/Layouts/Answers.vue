<script setup>
const props = defineProps({
    answers: "Array",
});
</script>

<template>
   
<!-- case card -->   
        <div  class="grid grid-cols-1 gap-9">
    <!-- card -->
                <div
                v-for="answer in answers"
                :key="answer.id"
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
                    <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                    {{ answer.body }}
                    </p>
                    <p id="test" class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                    отвечает - {{ answer.user_ans.name }}
                    </p>
        </div>
        </div>
    <!-- card -->
    </div>

    <!-- case card -->
</template> 