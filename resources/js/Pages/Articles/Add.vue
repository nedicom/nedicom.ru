<script setup>
import MainHeader from '@/Layouts/MainHeader.vue';
import Header from '@/Layouts/Header.vue';
import Body from '@/Layouts/Body.vue';
import MainFooter from '@/Layouts/MainFooter.vue';
import { ref } from 'vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import { reactive } from 'vue';

let form = reactive({
    header: '',
    body: '',   
});

let submit = () => {
    Inertia.post('/articles/create', form);
};

//import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
let title = ref('Добавить статью')
</script>

<template>
    <Head title="Добавить статью" />
   
    <MainHeader />
    
    <Header :ttl="title" />

    <Body>
        <div class="bg-white py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">                    
            
                    <div class="flex justify-start p-5">

                        <div class="mb-3 xl:w-3/6">
                        <form @submit.prevent="submit" class="">

                        <textarea v-model="form.header" @input="onInputheader" maxlength="55"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none "
                            id=""
                            rows="2"
                            placeholder="Заголовок"
                        ></textarea>
                        <div class="my-1 w-full bg-gray-200 rounded-full h-1 dark:bg-gray-700">
                            <div class="bg-blue-600 h-1 rounded-full"
                                :style="{ width: progresswidth + '%'}"
                            ></div>
                        </div>
                        <p class="text-xs text-gray-900 dark:text-white">Символов: {{wordscounter}}</p>
                        <textarea v-model="form.body" @input="onInputbody" 
                            class="h-80 form-control mt-3 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id=""
                            name="body"
                            rows="8"
                            placeholder="Ваша идеальная статья начинается здесь..."
                        ></textarea>

                        <!--<input name="url" v-model="form.url" :placeholder="form.url"> -->            

                            <!-- <div id="ckeditorwrap">
                            <ckeditor tag-name="textarea" 
                            :editor="editor" name="body" v-model="form.body" :config="editorConfig"></ckeditor>
                        </div>-->
                        
                        <button type="submit" class="my-5 inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Опубликовать
                        </button>

                        </form>
                        </div>

                        <div class="ml-3 xl:w-3/6">
                            <div class=" bg-gray-50 text-gray-800 ">
                                <h3 class="text-2xl font-bold p-3">Яндекс</h3>
                                <div class=" rounded-lg shadow-lg bg-white p-5 mx-5">                                    
                                    <h5 class="text-blue-800 text-xl line-clamp-2 leading-tight font-medium hover:text-red-400">{{yaheader}}</h5>
                                    <a href="#!" class="text-green-700 hover:text-red-400 transition duration-300 ease-in-out mb-4">https://nedicom.ru/статьи/<span>{{url}}</span></a>
                                        <p class="text-gray-700 line-clamp-3 text-base text-ellipsis"> {{yabody}}</p>
                                                                        
                                </div>
                                <h3 class="text-2xl font-bold p-3 mt-5">Google</h3>
                                <div class=" rounded-lg shadow-lg bg-white p-5 mx-5">
                                    <a href="#!" class=" transition duration-300 ease-in-out">https://nedicom.ru/статьи/<span>{{url}}</span></a>
                                    <h5 class="text-blue-700 no-underline line-clamp-2 hover:underline text-xl leading-tight font-medium my-1">{{gooheader}}</h5>                                    
                                    <p class="text-gray-700 text-base line-clamp-3 text-ellipsis overflow-hidden ...">{{goobody}}</p>
                                                                        
                                </div>
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
    export default { //?export object to DOM??
        data() {
            return {//retirning value or what?
                yaheader: 'Заголовок идеальной статьи в Яндексе', //yaheader is variable for ???
                yabody: 'Описание идеальной статьи в Яндексе. Яндекс любит краткое описание до  55 символов',
                gooheader: 'Заголовок идеальной статьи в Google',
                goobody: 'Описание идеальной статьи в Google. Google любит краткое описание до  50 символов',
                progresswidth: 0,
                wordscounter: 0,
                titletext: 'sometest',
            }
        },
        methods: {
            onInputheader(e) {//event, what is e
                this.yaheader = this.gooheader = e.target.value, //this keyword refers to an object, yaheader - method
                this.wordscounter = this.yaheader.length
                    if (this.yaheader.length <= 50) {
                        this.progresswidth = this.yaheader.length * 2;       
                    }
                if (e.target.value.length < 20) {
                    this.url = e.target.value;
                }
                
            },
            
            onInputbody(e) {
            this.yabody = e.target.value,   
            this.goobody = e.target.value
            },
        }
    }
</script>


<!--<script>
    export default {
        name: 'balloon',
        data() {
            return {
                editor: ClassicEditor,
                editorData: '123',
                editorConfig: {
                    placeholder:'Ваша иделаьная статья начинается здесь...',
                    toolbar: [ 'bold', 'italic', '|', 'link' ]
                }
            };
        },
    }


</script>-->
    
