<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import Body from "@/Layouts/Body.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import { ref } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { reactive } from "vue";

let form = reactive({
  header: "",
  body: "",
});

let submit = () => {
  Inertia.post("/questions/post", form);
};

//import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
let title = ref("Задать вопрос юристу");
</script>

<template>
  <Head title="Задать вопрос юристу" />

  <MainHeader />

  <Header :ttl="title" />

  <Body>
    <div class="bg-white py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="flex justify-start p-5">
            <div class="mb-3 xl:w-3/6">
              <form @submit.prevent="submit" class="">
                <textarea
                  v-model="form.header"
                  @input="onInputheader"
                  maxlength="55"
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
                  rows="2"
                  placeholder="Коротко опишите Ваш вопрос для заголовка"
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
                
                <textarea
                  v-model="form.body"
                  class="
                    h-50
                    form-control
                    mt-3
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
                  name="body"
                  rows="8"
                  placeholder="Здесь описание Вашего вопроса..."
                ></textarea>

               

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
                  Задать вопрос
                </button>
              </form>
            </div>

            <div class="ml-3 xl:w-3/6">
              <div class="bg-gray-50 text-gray-800">
                <h3 class="text-2xl font-bold p-3">Юрист 1</h3>
                
                <h3 class="text-2xl font-bold p-3 mt-5">Юрист 2</h3>
               
                  
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    
  </Body>

  <MainFooter />
</template>

<script>
export default {
  data() {
    return {
      progresswidth: 0,
      wordscounter: 0,
    };
  },
  methods: {
    onInputheader(e) {
      //event, what is e
      (this.header = e.target.value), //this keyword refers to an object, yaheader - method
        (this.wordscounter = this.header.length);
      if (this.header.length <= 50) {
        this.progresswidth = this.header.length * 2;
      }
    },

  },
};
</script>

    
