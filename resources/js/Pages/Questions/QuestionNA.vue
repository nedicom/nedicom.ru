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
import Comment from '@/Components/Comment.vue';
import Question from '@/Components/Question.vue';

let set = defineProps({
    ownercookie: Object,
    test: String,
});

const user = usePage().props.value.auth.user;

const form = useForm({
    header: set.ownercookie.questionTitle,
    body: set.ownercookie.questionBody,
});

let submit = () => {
  Inertia.post("/questions/post", form);
};


function testus(){
   Inertia.visit('/question/nonauth', { search: 'John' }, { only: ['ownercookie'] })
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


    <Question>  
    <template v-slot:title>
        {{ownercookie.questionTitle}}
    </template>
    <template v-slot:body>
        {{ownercookie.questionBody}}
    </template>
    </Question>

            <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
                <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                    <SendButton class="" :onclick="submit" :disabled="!user">Опубликовать</SendButton>
                </article>
            </div>
    
    <div class="flex justify-center">
        <div class="xl:w-4/6 mx-5 sm:px-6 lg:px-4 py-12 bg-white overflow-hidden shadow-sm sm:rounded-lg"
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
                    <Comment>{{test}}</Comment>
                    <button @click="testus">testгы</button>
            </div>
            </div>
        <!-- card -->
            </div>
        </div>
    </div>
  </Body>

  <MainFooter />
  </div>
</template>