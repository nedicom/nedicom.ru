<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import Body from "@/Layouts/Body.vue";
import Answer from "@/Layouts/Answer.vue";
import Answers from "@/Layouts/Answers.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import { Head, usePage } from "@inertiajs/inertia-vue3";

defineProps({
  question: "$string",
  answers: "Array",
  ownercookie: String,
});

const user = usePage().props.value.auth.user;

</script>

<template>
  <Head>
    <title>{{question.title}}</title>
    <meta name="description" :content="question.body" />
  </Head>

  <div class="min-h-screen">
  <MainHeader />

  <Header :ttl="question.title" />

  <Body>
    <div class="xl:w-4/6 sm:px-6 lg:px-4 mx-auto py-12 bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="px-6 text-gray-900">{{ question.body }}
      </div>

    <div v-if="!user" class=""
        >
        Чтобы получить ответ
        </div>

  <Answers class="xl:w-4/6 sm:px-6 lg:px-4 mx-auto py-12 bg-white overflow-hidden shadow-sm sm:rounded-lg"
         :answers="answers"/>     

  <Answer class="xl:w-4/6 sm:px-6 lg:px-4 mx-auto py-12 bg-white overflow-hidden shadow-sm sm:rounded-lg"
         :question="question"/>


    </div>
  </Body>

  <MainFooter />
  </div>
</template>


