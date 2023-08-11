<script setup>
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    statusonimage: String,
    nameonimage: String,
    mainbannerimg: String,
});

let form = reactive({
  phone: "",
});


let submit = () => {
  Inertia.post("/phone/send", form);
}
</script>

<template>
<!-- main banner -->
    <div
    class="
        relative 
        overflow-hidden 
        bg-cover  
        bg-no-repeat
        bg-md-top
        w-full
        h-96
        "
        
    :style="{ backgroundImage: `url(${mainbannerimg})`}"
    >
        <div
            class="grid grid-cols-1 justify-items-end content-center w-full h-full"
            style="background-color: rgba(0, 0, 0, 0.1); opacity: 1;">

            <div class="md:w-1/2 md:float-right">
                <div class="flex  items-center justify-center">            
                
                    <div class="text-black text-center">
                        
                        <div class="m-5">
                            <span class="mb-4 text-4xl font-semibold bg-white rounded-lg py-1 px-4">{{ nameonimage }} {{ statusonimage }}</span>
                        </div>
                        <div  class="m-5">
                            <span class="text-xl font-semibold bg-white rounded-lg py-1 px-4">Запись на консультацию</span>
                        </div>
                    
                        <div class="flex justify-center">
                            <form @submit.prevent="submit" class="w-80 space-y-6">
                                <div>                    
                                    <input v-model="form.phone" type="number" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="+7" required>
                                </div>
                                <div class="flex justify-between">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" checked required>
                                        </div>
                                        <label for="remember" class="ml-2 text-sm font-medium text-white-900 dark:text-gray-300">Согласен с политикой сайта</label>
                                    </div>
                                    <a href="/policy" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Подробнее</a>
                                </div>
                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Отправить</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>            
        </div>         
    </div>
    <!-- main banner -->
</template>