<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import Body from "@/Layouts/Body.vue";
import Answer from "@/Layouts/Answer.vue";
import Answers from "@/Layouts/Answers.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import { Inertia } from "@inertiajs/inertia";
import { Head, usePage, useForm } from "@inertiajs/inertia-vue3";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SendButton from '@/Components/SendButton.vue';

let set = defineProps({
    ownercookie: Object,
});

const user = usePage().props.value.auth.user;

const form = useForm({
    header: set.ownercookie.questionTitle,
    body: set.ownercookie.questionBody,
});

let submit = () => {
  Inertia.post("/questions/post", form);
};
</script>

<template>
  <Head>
    <title>{{ownercookie.questionTitle}}</title>
    <meta name="description" :content="ownercookie.questionBody" />
  </Head>

  <div class="min-h-screen">
  <MainHeader />

  

  <Body>
    <div class="xl:w-4/6 sm:px-6 lg:px-4 mx-auto py-12 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div  class="mb-5"
        >
        Ваш вопрос (еще не опубликован)
        </div>
        <div class="px-6 text-gray-900">{{ownercookie.questionBody}}
        </div>
    </div>

        <div class="xl:w-4/6 sm:px-6 lg:px-4 mx-auto bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <SendButton class="m-5" :onclick="submit" :disabled="!user">Опубликовать</SendButton>
        </div>

        <div v-if="user == null" class="xl:w-4/6 sm:px-6 lg:px-4 mx-auto bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
            <p class="text-xs">чтобы опубликовать Ваш вопрос. Не волнуйтесь. После входа или регистрации мы вернем Вас на эту страницу
            </p>
        </div>



    

    <div class="xl:w-4/6 sm:px-6 lg:px-4 mx-auto py-12 bg-white overflow-hidden shadow-sm sm:rounded-lg"
    >
        <div  class="grid grid-cols-1 gap-9 my-2">
                <div
                class="flex justify-center"
                >
                <div
                    class="
                    block
                    min-w-full
                    p-6
                    rounded-lg
                    shadow-lg
                    bg-white
                    max-w-sm
                    "
                >
                    <p class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                    Так будет выглядеть первый ответ на Ваш вопрос
                    </p>
                    <p id="test" class="text-gray-700 text-base line-clamp-3 h-min-24 mb-2">
                    отвечает - первый юрист
                    </p>
        </div>
        </div>
    <!-- card -->
        </div>
    </div>
  </Body>

  <MainFooter />
  </div>
</template>