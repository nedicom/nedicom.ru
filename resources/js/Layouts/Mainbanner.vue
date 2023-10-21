<script setup>
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { useReCaptcha } from "vue-recaptcha-v3";

const props = defineProps({
    statusonimage: String,
    nameonimage: String,
    mainbannerimg: String,
});


let form = reactive({
  phone: "",
  captcha_token: null,
});

    const { executeRecaptcha, recaptchaLoaded } = useReCaptcha();
    
    const recaptcha = async () => {
      await recaptchaLoaded()
      form.captcha_token = await executeRecaptcha('login')
      submit();
    }

let submit = () => {
  Inertia.post("/phone/send", form)
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
        md:h-screen        
        "
        
    :style="{ backgroundImage: `url(${mainbannerimg})`}"
    >
        <div
            class="grid grid-cols-1 md:justify-items-end content-center py-5 w-full h-full"
            style="background-color: rgba(0, 0, 0, 0.1); opacity: 1;">

            <div class="md:w-1/2 md:float-right">
                <div class="flex  items-center justify-center">            
                
                    <div class="text-black text-center">
                        
                        <div class="m-5">
                            <span class="goo text-4xl font-semibold">{{ nameonimage }}  {{ statusonimage }}</span>
                        </div>
                        <div  class="m-5">
                            <span class="goo text-xl font-semibold bg-white rounded-lg py-1 px-4">Запись на консультацию</span>
                        </div>

                        <!-- Form on main banner-->
                        <div class="flex justify-center">
                            <form @submit.prevent="recaptcha" class="w-80 space-y-6">
                                <div>                    
                                    <input v-model="form.phone" type="number" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="+7" required>
                                </div>
                                <div class="flex justify-between">
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" checked required>
                                        </div>
                                        <label for="remember" class="bg-white px-1 rounded-lg ml-2 text-sm font-medium text-white-900 dark:text-gray-300">Согласен с политикой сайта</label>
                                    </div>
                                    <a href="/policy" class="text-sm bg-white px-1 rounded-lg text-blue-700 hover:underline dark:text-blue-500">Подробнее</a>
                                </div>

                                <button type="submit"  id="recaptcha"
                                    class="g-recaptcha w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Отправить</button>                               
                            </form>
                        </div>
                        <!-- Form on main banner-->

                    </div>
                </div>
            </div>            
        </div>         
    </div>
    <!-- main banner -->

    <!-- Filter: https://css-tricks.com/gooey-effect/ -->
    <svg style="visibility: hidden; position: absolute;" width="0" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1">
        <defs>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="5" result="blur" />    
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
                <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
            </filter>
        </defs>
    </svg>
    
</template>

<style lang="scss">
    :root {
    --color-highlight: #fff;
    --font: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
}

.goo {
    line-height: 1.35;
    display: inline;
    box-decoration-break: clone;
    background: var(--color-highlight);
    padding: 0.2rem 1rem;
    filter: url('#goo');
}

.goo:focus {
    outline: 0;
}


</style>