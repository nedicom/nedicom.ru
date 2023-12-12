<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { usePage } from "@inertiajs/inertia-vue3";

const user = usePage().props.value.auth.user;
</script>


<template>
    <main class="pt-16 xl:mt-16 bg-white dark:bg-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-8 lg:mb-6 not-format">


                <div class="flex items-center mb-5">
                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img
                            class="mr-2 w-6 h-6 rounded-full"
                            src="/storage/default/user.webp"
                            alt="Незарегистрированный пользователь">Вы</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400"><time>Только что</time></p>
                </div>

                <h1 class="mb-4 text-2xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                    <slot name="title"></slot>
                </h1>
            </header>
            <p class="h-24 grid  content-center"><slot name="body"></slot></p>

            <div v-if="user == null" class="mt-5 pt-5">
                <PrimaryButton>
                    <a :href="route('login')">            
                        Войдите
                    </a>
                </PrimaryButton>
                или
                <PrimaryButton>
                    <a :href="route('register')">
                        Зарегистрируйтесь
                    </a>
                </PrimaryButton>
                <p class="text-xs mt-5">чтобы опубликовать Ваш вопрос. Не волнуйтесь, вопрос сохранен
                </p>
            </div>
    
        </article>
    </div>
    </main>
</template>