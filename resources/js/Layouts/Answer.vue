<script setup>
import { ref } from "vue";
import { usePage } from '@inertiajs/inertia-vue3';
import { Inertia } from "@inertiajs/inertia";
import { reactive } from "vue";

let set = defineProps({
  question: "$string",
  placeholder: String,
});

let form = reactive({
  body: "",
  questions_id: set.question.id,
  url: set.question.id,
});


const user = usePage().props.value.auth.user;
let ownerId;
  if(user==null){
    ownerId = 0;
  }
  else{
    ownerId = user.id;
  }
let placeholder;
placeholder = (set.question.user_id == ownerId) ? "Вы можете дополнить свой вопрос, если посчитаете нужным." : "Ваш грамотный ответ. Старайтесь ответить максимально полно, это поможет тому кто задал вопрос и всему миру.";

let submit = () => {
  //Inertia.post("/answerpost", form);
  Inertia.post(route('answer.post'), form, { preserveState: false, preserveScroll: true })
  window.scrollTo(0, document.body.scrollHeight);
};
</script>

<template>
              <form 
              @submit.prevent="submit" 
              class="">

                <input v-model="form.question_id" class="invisible">
            
                <textarea
                  v-model="form.body"
                  @input="onInputheader"
                  spellcheck="true"
                  maxlength="1000"
                  required
                  class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700
                    focus:bg-white
                    focus:border-blue-600
                    focus:outline-none
                  "
                  id=""
                  rows="4"
                  :placeholder="placeholder"
                ></textarea>
                <div
                  class="
                    my-1
                    w-full
                    bg-gray-200
                    rounded-full
                    h-1
                    dark:bg-gray-700
                  "
                >
                  <div
                    class="bg-blue-600 h-1 rounded-full"
                    :style="{ width: progresswidth + '%' }"
                  ></div>
                </div>
                <p class="text-xs text-gray-900 dark:text-white">
                  Символов: {{ wordscounter }}
                </p>

                <button
                  type="submit"
                  class="
                    my-5
                    inline-flex
                    items-center
                    px-5
                    py-2.5
                    text-sm
                    font-medium
                    text-center text-white
                    bg-blue-700
                    rounded-lg
                    focus:ring-4 focus:ring-blue-200
                    dark:focus:ring-blue-900
                    hover:bg-blue-800
                  "
                >
                  Ответить
                </button>
              </form>
              <div class="overflow-y-auto" scroll-region>
  <!-- Your page content -->
</div>
</template>
    