<script setup>
import MainHeader from "@/Layouts/MainHeader.vue";
import Header from "@/Layouts/Header.vue";
import Body from "@/Layouts/Body.vue";
import MainFooter from "@/Layouts/MainFooter.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
import { Head } from "@inertiajs/inertia-vue3";
import { ModalsContainer, useModal } from "vue-final-modal";
import DeleteModalConfirm from "@/Components/DeleteModalConfirm.vue";
import { Inertia } from "@inertiajs/inertia";

let title = ref("Мои вопросы");
let modalTitle = ref(null);
let questionId = ref(null);

defineProps({
    questions: "Array",
});

const { open, close } = useModal({
    component: DeleteModalConfirm,
    attrs: {
        title: modalTitle,
        id: questionId,
        onConfirm(id) {
            Inertia.post(`/questions/${id}/delete`), close();
        },
        onClose() {
            close();
        },
    },
    slots: {
        default: "<p>UseModal: The content of the modal</p>",
    },
});

const handleDelete = (id, title) => {
    questionId.value = id;
    modalTitle.value = title;
    open();
};
</script>

<template>
    <Head title="Панель управления" />

    <div class="min-h-screen flex flex-col">
        <MainHeader />

        <ModalsContainer />

        <Body>
            <div
                class="bg-white py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-hidden shadow-sm sm:rounded-lg"
            >
                <div
                    v-if="questions.total > 0"
                    class="grid md:grid-cols-3 gap-9"
                >
                    <!-- card -->
                    <div
                        v-for="questions in questions.data"
                        :key="questions.id"
                        class="flex justify-center mx-3 md:mx-0"
                    >
                        <div
                            class="block min-w-full p-6 rounded-lg shadow-lg bg-white max-w-sm"
                        >
                            <h5
                                class="text-gray-900 text-xl leading-tight line-clamp-1 font-medium h-6 mb-2"
                            >
                                {{ questions.header }}
                            </h5>

                            <p
                                class="text-gray-700 text-xs line-clamp-3 h-12 mb-2"
                            >
                                {{ questions.body }}
                            </p>

                            <div class="flex justify-between">
                                <a
                                    :href="
                                        route('questions.url', questions.url)
                                    "
                                    class="text-blue-500 underline dark:text-blue-500 hover:no-underline"
                                    >смотреть</a
                                >

                                <button
                                    @click="
                                        handleDelete(
                                            questions.id,
                                            questions.title
                                        )
                                    "
                                    class="btn btn-light w-100 ml-5"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-6 h-6"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- card -->
                </div>

                <!-- row -->
                <div v-else class="flex justify-center h-96">
                    <div
                        class="block p-6 rounded-lg shadow-lg bg-white max-w-sm"
                    >
                        <h5
                            class="text-gray-900 text-xl leading-tight font-medium mb-2"
                        >
                            Вопросов пока нет
                        </h5>
                        <p class="text-gray-700 text-base mb-2">
                            Самое время
                            <a
                                :href="route('questions.add')"
                                class="basis-2/12 text-end text-blue-500 underline dark:text-blue-500 hover:no-underline"
                                >задать вопрос</a
                            >
                        </p>
                    </div>
                </div>
                <!-- row -->

                <Pagination :links="questions.links" />
            </div>
        </Body>

        <MainFooter />
    </div>
</template>

<script>
import Pagination from "@/Components/Pagination.vue";
export default {
    components: {
        Pagination,
    },
};
</script>
