<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import Body from "@/Layouts/Body.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import Editor from '@/Components/Tiptap.vue'
import { ref } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { reactive } from "vue";

let form = reactive({
  header: "",
  description: "",
});

let submit = () => {
  Inertia.post("/uslugi/create", form);
};

let title = ref("Добавить услугу");
</script>

<template>
  <Head title="Добавить услугу" />

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
                  spellcheck="true"
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
                  placeholder="Название услуги"
                ></textarea>


                <textarea
                  v-model="form.description"
                  spellcheck="true"
                  class="
                    h-20
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
                  name="description"
                  rows="3"
                  placeholder="Описание услуги"
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
                  Опубликовать
                </button>
              </form>
            </div>

            
          </div>
        </div>
      </div>
    </div>
  </Body>

  <MainFooter />
</template>