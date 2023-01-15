<script setup>
import MainHeader from '@/Layouts/MainHeader.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import { reactive } from 'vue';

let form = reactive({
    header: '',
    body: ''
});

let submit = () => {
    Inertia.post('/articles/create', form);
};

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

</script>

<template>
    <Head title="Добавить статью" />

     <MainHeader>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Статьи</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
            
                  <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">
                      <form @submit.prevent="submit">

                      <textarea v-model="form.header" class="form-control mb-3 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none "
                        id="exampleFormControlTextarea1"
                        name="header"
                        rows="2"
                        placeholder="Заголовок"
                      ></textarea>

                      <div id="id">
                          <ckeditor  tag-name="textarea" class="form-control h-72 mb-3 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none "
                          :editor="editor" name="body" v-model="form.body" :config="editorConfig"></ckeditor>
                      </div>
                    
                      <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                          Опубликовать
                      </button>

                      </form>

                    </div>
                  </div>
    

                </div>
            </div>
        </div>
    </MainHeader>

</template>


<script>
    export default {
        name: 'balloon',
        data() {
            return {
                editor: ClassicEditor,
                editorData: '',
                editorConfig: {
                    placeholder:'Ваша иделаьная статья начинается здесь...',
                    toolbar: [ 'bold', 'italic', '|', 'link' ]
                }
            };
        }
    }
</script>
