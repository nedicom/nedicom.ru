<script setup>
import Question from "@/Layouts/PopupDialogue/Question.vue";
import Answer from "@/Layouts/PopupDialogue/Answer.vue";
import { ref, reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-vue3";

const vision = ref(false);
const message = ref(null);

let processing = ref(false);
let printing = ref(false);

let btncls = "w-14 h-14";
let rotate = "";

let form = reactive({
  mess: "message.value.innerText",
  location: usePage().props.value.ziggy.url,
  location_header: usePage().props.value.ziggy.url,
});

setTimeout(() => {
  vision.value = true;
}, 60000);

function fuck() {
  if (vision.value == false) {
    btncls = "w-8 h-8";
    rotate = "rotate-45";
    vision.value = true;
  } else {
    btncls = "w-14 h-14";
    rotate = "rotate-0";
    vision.value = false;
  }
}

let send = () => {
  form.mess = message.value.innerText;
  message.value.innerText = "";
  Inertia.patch(route("message"), form, {
    preserveState: true,
    preserveScroll: true,
    onStart: () => {
      processing.value = true;
    },
    onFinish: () => {
      processing.value = false;
      Inertia.patch(route("message.sent"), form, {
        preserveState: true,
        preserveScroll: true,
        onStart: () => {
          printing.value = true;
        },
        onFinish: () => {
          printing.value = false;
        },
      });
    },
  });
};
</script>
<template>
  <div class="fixed w-full md:w-80 md:right-1 md:bottom-3 right-1 bottom-1">
    <div class="flex flex-col mr-0 ml-2">
      <!-- dialogue button -->
      <div class="flex justify-end mb-3">
        <button
          :onclick="fuck"
          type="button"
          class="flex items-center justify-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800"
          :class="btncls"
        >
          <svg
            class="w-5 h-5 transition-transform delay-300"
            :class="rotate"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 18 18"
          >
            <path
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M9 1v16M1 9h16"
            />
          </svg>
        </button>
      </div>
      <!-- dialogue all -->

      <div
        v-if="vision"
        class="h-96 flex flex-col items-start bg-white rounded-t-lg border-t-4 border-x-2 border-gray-900"
      >
        <!-- dialogue -->

        <div
          class="h-full w-full bg-green-300 scroll-smooth rounded-t-md overflow-auto py-5"
        >
          <div
            v-if="$page.props.dialogue.message"
            class="h-full grid grid-cols-1 content-end"
          >
            <div
              v-for="question in JSON.parse($page.props.dialogue.message.json)"
              :key="question"
            >
              <Question
                v-if="question.user_message"
                :question="question.user_message"
              />
              <Answer
                v-if="question.ai_message"
                :answer="question.ai_message"
              />
              <Answer v-if="printing">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill="currentColor"
                  class="animate-pulse  bi bi-three-dots"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"
                  />
                </svg>
              </Answer>
            </div>
          </div>
        </div>

        <!-- message input -->
        <div class="sticky top-[100vh] w-full my-1 flex px-2">
          <div
            ref="message"
            contenteditable="true"
            class="w-full rounded-full p-1 h-auto max-h-1/3 scroll-smooth overflow-auto text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
          ></div>

          <!-- send button -->
          <div class="grid grid-cols-1 content-center ml-1">
            <button
              :disabled="processing"
              :onclick="send"
              type="button"
              class="flex items-center justify-center text-white bg-blue-700 rounded-lg w-7 h-7 hover:bg-blue-800"
            >
              <svg
                v-if="processing"
                aria-hidden="true"
                role="status"
                class="animate-spin inline w-4 h-4 me-3 mr-1 text-gray-200 dark:text-gray-600"
                viewBox="0 0 100 101"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                  fill="currentColor"
                />
                <path
                  d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                  fill="#1C64F2"
                />
              </svg>
              <svg
                v-else
                class="w-5 h-5 transition-transform group-hover:rotate-45"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 18 18"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9 1v16M1 9h16"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
::-webkit-scrollbar {
  width: 10px;
}

::-webkit-scrollbar-track {
  background: #888;
  border-radius: 5px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #000;
  border-radius: 5px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
</style>