<script setup>
defineProps({
  sldimg: Array,
  sliderheader: String,
});
</script>

<template>
  <h1 class="text-4xl font-semibold text-grey text-center py-10">
    {{ sliderheader }}
  </h1>
  
  <div v-if="sldimg">
    <Carousel :itemsToShow="3.95" :wrapAround="true" :transition="500">
      <Slide v-for="slide in sldimg" :key="slide.practice_file_path">
        <div class="carousel__item">
          <a :href= "'/articles/'+slide.url"><img :src = "'/'+slide.practice_file_path">     </a>     
        </div>
      </Slide>

      <template #addons>
        <Navigation />
        <Pagination />
      </template>
    </Carousel>
  </div>

  <div v-else>
    <Carousel :itemsToShow="3.95" :wrapAround="true" :transition="500">
      <Slide v-for="slide in 1" :key="slide">
        <div class="carousel__item">
          
          Юрист еще не добавил практику
          
        </div>
      </Slide>

      <template #addons>
        <Navigation />
        <Pagination />
      </template>
    </Carousel>
  </div>
</template>
  
  <script>
  import { defineComponent } from 'vue'
  import { Carousel, Pagination, Navigation, Slide } from 'vue3-carousel'
  
  import 'vue3-carousel/dist/carousel.css'
  
  export default defineComponent({
  name: 'Basic',
  components: {
    Carousel,
    Slide,
    Pagination,
    Navigation,
  },
})
</script>

<style scoped>
.carousel__slide {
  padding: 5px;
}

.carousel__viewport {
  perspective: 2000px;
}

.carousel__track {
  transform-style: preserve-3d;
}

.carousel__slide--sliding {
  transition: 0.5s;
}

.carousel__slide {
  opacity: 0.9;
  transform: rotateY(-20deg) scale(0.9);
}

.carousel__slide--active ~ .carousel__slide {
  transform: rotateY(20deg) scale(0.9);
}

.carousel__slide--prev {
  opacity: 1;
  transform: rotateY(-10deg) scale(0.95);
}

.carousel__slide--next {
  opacity: 1;
  transform: rotateY(10deg) scale(0.95);
}

.carousel__slide--active {
  opacity: 1;
  transform: rotateY(0) scale(1.3);
}
</style>