<script setup>
import Modal from '@/Components/Modal.vue';

let address ="Респ. Крым, г. Симферополь, ул. Долгоруковская, 5";
let  phone ="+7 978 8838 978";

const props = defineProps({
    ttl: String,
    address: String,
    phone: String,
});

    if(props.address !== undefined){
        address = props.address;
    }
    if(props.phone !== undefined){
        phone = props.phone;
    }

let phoneto = "tel:"+phone;

</script>


<template>
    <!-- Page Heading -->
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/24900584" style="position:absolute; left:-9999px;"></div>
    </noscript>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight grid gap-4 md:grid-cols-3 text-center">
                <div ><Modal /></div>
                
                <div><a href="#address">{{ address }}</a></div>
                <div><a :href="phoneto" >{{ phone }}</a></div>
            </h2>
        </div>
    </header>
</template>
