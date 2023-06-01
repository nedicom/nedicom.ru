<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Cropper } from 'vue-advanced-cropper';
import 'vue-advanced-cropper/dist/style.css';
</script>

<template>

  <form action="imagepost" method="POST" class="mt-6 space-y-6">

      <cropper
      :src="img"
      @change="change"
    />

    <InputLabel for="userimage" value="Ваше сногсшибательное изображение" />
    <input type="file" name="userimage" id="userimage" accept="image/*" @change="onChange" />
    <div id="preview">
      <img v-if="item.imageUrl" :src="item.imageUrl" 
      class="mx-auto mb-4 w-32 rounded-lg"
    alt="Avatar"
      />

    </div>
    <div class="flex items-center gap-4">
                <PrimaryButton>Сохранить</PrimaryButton>
            </div>

  </form>
  </template>
  
  
  <script>
  
  export default {
    components: {
		Cropper,
	},
    data() {
      return {
        img: null,
        item:{
            //...
            image : null,
            imageUrl: null
        }
      }
    },
    methods: {
      change({ coordinates, canvas }) {
			console.log(coordinates, canvas);
		},
      onChange(e) {
        const file = e.target.files[0]
        this.image = file
        this.item.imageUrl = URL.createObjectURL(file)
        this.img = URL.createObjectURL(file)
      },   
    }
  } 
  </script>