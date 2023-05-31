<script setup>
import InputLabel from '@/Components/InputLabel.vue';
</script>

<template>
    <InputLabel for="userimage" value="Ваше сногсшибательное изображение" />
    <input type="file" name="userimage" id="userimage" accept="image/*" @change="onChange" />
    <div id="preview">
      <img v-if="item.imageUrl" :src="item.imageUrl" 
      class="mx-auto mb-4 w-32 rounded-lg"
    alt="Avatar"
      />

    </div>
  </template>
  
  
  <script>
  export default {
    data() {
      return {
        item:{
            //...
            image : null,
            imageUrl: null
        }
      }
    },
    methods: {
      onChange(e) {
        const file = e.target.files[0]
        this.image = file
        this.item.imageUrl = URL.createObjectURL(file)
      },   
    }
  } 
  </script>