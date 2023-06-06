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

let set = defineProps({
    uslugi: String,
});

let form = reactive({
  header: set.uslugi.usl_name,
  description: set.uslugi.usl_desc,
  id: set.uslugi.id,
});

function submit() {
  Inertia.post("/uslugi/{url}/update", form);
}

let title = ref("Редактировать статью");

</script>

<template>
  <Head title="Редактировать статью" />

  <MainHeader />

  <Header :ttl="title" />

  <Body>
    <div class="bg-white py-12">   
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="flex justify-start p-5">
            <div class="mb-3 xl:w-3/6">    
              <form @submit.prevent="submit">
                <input v-model="form.id" class="invisible">         
                <textarea
                  v-model="form.header"   
                  spellcheck="true"
                  name="header"
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
                  rows="2"      
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
                  rows="3"
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
                  Обновить
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