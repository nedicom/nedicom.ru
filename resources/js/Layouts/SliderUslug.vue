<script setup>
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import Modal from "@/Components/Modal.vue";

const props = defineProps({
    uslugislider: String,
});

let form = reactive({
    phone: "",
});

let ModalBtnText = "Подробнее";

let submit = () => {
    Inertia.post("/phone/send", form);
};
</script>

<template>
    <h1 class="text-4xl font-semibold text-grey text-center py-10">
        Дела, по которым мы помогаем
    </h1>
    <Carousel v-bind="settings" :breakpoints="breakpoints">
        <Slide v-for="slide in uslugislider" :key="slide">
            <div class="carousel__item">
                        <!-- card -->
                        
                            <div
                                class="bg-gray-100 h-80 mx-1 rounded-lg"
                            >
                                <h5
                                    class="text-gray-900 h-24 text-2xl line-clamp-2 font-medium py-6 px-1"
                                ><div>{{ slide.usl_name }}</div>
                                    
                                </h5>
                                <p
                                    class="text-gray-700 h-32 text-base line-clamp-5 h-min-24 h-max-48 mb-2 px-1"
                                >
                                    {{ slide.usl_desc }}
                                </p>
                                <Modal :ModalBtnText="ModalBtnText" />
                            </div>
                        
                        <!-- card -->
            </div>
        </Slide>

        <template #addons>
            <Navigation />
        </template>
    </Carousel>

    <div class="flex justify-center m-3">
        <a
            href="/uslugi"
            class="text-lg text-blue-700 hover:underline dark:text-blue-500"
        >
            Полный перечень услуг</a
        >
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
            itemsToShow: 1,
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
                itemsToShow: 5,
                snapAlign: "start",
            },
        },
    }),
});
</script>
