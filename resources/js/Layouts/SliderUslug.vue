<script setup>
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import Modal from "@/Components/Modal.vue";

defineProps({
    uslugislider: String,
});

let form = reactive({
    phone: "",
});

let ModalBtnText = "Записаться на консультацию";

let submit = () => {
    Inertia.post("/phone/send", form);
};
</script>

<template>
    <h1 class="text-4xl font-semibold text-grey text-center py-10 ">
        Дела, по которым мы помогаем
    </h1>
    <div class="py-10 bg-gray-200">
        <Carousel v-bind="settings" :breakpoints="breakpoints">
            <Slide v-for="card in uslugislider" :key="card">
                <div class="carousel__item w-full mx-3 ">
                    <!-- card -->
                    <div
                        class="w-full mx-1 rounded-lg border-1 border-gray-600 flex flex-col bg-white"
                    >
                        <div
                            class="group flex items-center justify-center my-6 h-36"
                        >
                            <div class="rounded-full">
                               1
                            </div>
                        </div>

                        <div class="my-2 grid grid-cols-1 content-center">
                            <h5
                                class="text-gray-900 subpixel-antialiased text-center text-lg line-clamp-2 font-bold px-1"
                            >
                                2
                            </h5>
                        </div>

                        <div class="h-24 grid grid-cols-1 content-center">
                            <p class="text-gray-700/75 line-clamp-3 px-5">
                                3
                            </p>
                        </div>

                        <div class="h-24 grid grid-cols-1 content-center">
                            <Modal :ModalBtnText="ModalBtnText" />
                            <a
                                href="/"
                                class="my-3 text-sm text-gray-700/75"
                                >подробнее</a
                            >
                        </div>
                    </div>

                    <!-- card -->
                </div>
            </Slide>

            <template #addons>
                <Navigation />
            </template>
        </Carousel>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import { Carousel, Navigation, Slide } from "vue3-carousel";

import "vue3-carousel/dist/carousel.css";

export default defineComponent({
    name: "Breakpoints",
    components: {
        Carousel,
        Slide,
        Navigation,
    },
    data: () => ({
        // carousel settings
        settings: {
            itemsToShow: 1.25,
            snapAlign: "center",
        },
        // breakpoints are mobile first
        // any settings not specified will fallback to the carousel settings
        breakpoints: {
            // 700px and up
            700: {
                itemsToShow: 3.5,
                snapAlign: "center",
            },
            // 1024 and up
            1024: {
                itemsToShow: 4.5,
                snapAlign: "start",
            },
        },
    }),
});
</script>
