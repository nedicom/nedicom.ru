<script setup>
import Modal from '@/Components/Modal.vue';

let address ="Республика Крым";
let secondaddress ="город Москва";
let  phone ="+7 978 8838 978";
let  secondphone ="+7 985 558 21 70";

const props = defineProps({
    ttl: String,
    address: String,
    phone: String,
});

    if(props.address !== undefined){
        address = props.address;
        secondaddress = '';
    }
    if(props.phone !== undefined){
        phone = props.phone;
        secondphone = '';
    }

let phoneto = "tel:"+phone;
let secondphoneto = "tel:"+secondphone;

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
                
                <div class="text-1xl">
                    <a href="#address" class="md:float-right">{{ address }}</a><br>
                    <a href="#address" class="md:float-right">{{ secondaddress }}</a>                
                </div>
                <div >
                    <a :href="phoneto" class="md:float-left md:ml-5">{{ phone }} </a><br>
                    <a v-if="secondphone" :href="secondphoneto" class="md:float-left md:ml-5" >{{ secondphone }}</a>
                </div>
                
            </h2>
        </div>
    </header>
</template>
