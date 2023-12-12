<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineProps({
    comment: String,
});
</script>

<template>
    <div class="mt-5 pt-5">
        <PrimaryButton>
            <a :href="route('login')"> Войдите </a>
        </PrimaryButton>
        или
        <PrimaryButton>
            <a :href="route('register')"> Зарегистрируйтесь </a>
        </PrimaryButton>
        <p class="text-xs mt-5">
            {{ comment }} 
        </p>
    </div>
</template>
