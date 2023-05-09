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
    class="relative overflow-hidden bg-cover bg-no-repeat p-12 text-center mb-9"
    :style="{ backgroundImage: `url({mainbannerimg})` , height: '600px'}"
    >
    <div
    class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
    style="background-color: rgba(0, 0, 0, 0.1); opacity: 1;">

    <div class="h-full md:w-1/2 md:float-right">
        <div class="flex h-full items-center justify-center">            
        <div class="text-white">
            <h2 class="mb-4 text-4xl font-semibold"> {{ statusonimage }}</h2>
            <h4 class="mb-12 text-2xl font-semibold">{{ nameonimage }}</h4>
            <h2 class="mt-12 text-3xl font-semibold">Запись</h2>
            <h4 class="text-xl font-semibold">на консультацию</h4>
            <div class="">
            <form @submit.prevent="submit" class="space-y-6">
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