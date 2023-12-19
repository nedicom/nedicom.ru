<script setup>
defineProps({
  questions: "Array",
});
</script>

<template>
        <div v-if="questions.total > 0" class="grid md:grid-cols-3 gap-9">
          <!-- card -->
          <div
            v-for="questions in questions.data"
            :key="questions.id"
            class="flex justify-center mx-3 md:mx-0"
          >
            <div
              class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm"
            >
              <h5
                class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium h-6 mb-2"
              >
                {{ questions.title }}
              </h5>

              <p class="text-gray-700 text-xs line-clamp-3 h-12 mb-2">
                {{ questions.body }}
              </p>

              <div class="flex justify-between">
                <a
                  :href="route('questions.url', questions.url)"
                  class="text-blue-500 underline dark:text-blue-500 hover:no-underline"
                  >смотреть</a
                >

                <p class="text-gray-500">
                  ответили:
                  <span class="inline-flex items-center ml-2 rounded-full bg-blue-500 px-2 py-1 text-xs font-bold text-white"
                    ><span v-if="questions.quantity_ans_count">{{
                      questions.quantity_ans_count
                    }}</span>
                    <span v-else>0</span>
                  </span>
                </p>

                <button
                  v-if="$page.props.auth.user.isadmin"
                  @click="handleDelete(questions.id, questions.title)"
                  class="btn btn-light w-100 ml-5"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                    />
                  </svg>
                </button>
              </div>
            </div>
          </div>
          <!-- card -->
        </div>
</template>