<script setup>
import { computed } from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps({
    checked: {
        type: [Array, Boolean],
        default: true,
    },
    unchecked: {
        type: [Array, Boolean],
        default: false,
    },
    islawyer: Number,
    val: Number,
});

const proxyChecked = computed({
    get() {
        if(props.islawyer == 1){
            return props.checked;
        }
        else{
            return props.unchecked;
        }        
    },

    set(val) {
        if(props.islawyer == 1){
            val = 1;
        }
        emit('update:checked', val);
    },
});
</script>

<template>
    <input
        type="checkbox"
        :value="val"
        v-model="proxyChecked"
        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
    />
</template>
