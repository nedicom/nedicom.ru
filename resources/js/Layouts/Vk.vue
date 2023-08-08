<script>
import { ref } from 'vue'
import VKOpenApi from '@/VKOpenApi.js'

export default {
    setup() {
        const status = ref('loading')

        VKOpenApi.then(() => {
            status.value = 'Script loaded'
            VK.Widgets.Group('vk_groups', {mode: 0, width: 'auto', height: '400', 
                              color1: "FFFFFF", color2: "000000", color3: "1976d2"}, 
                              72406118)
        })

        return {
            status
        }
    }
}
</script>

<template>
    <h1 class="text-4xl font-semibold text-grey text-center py-10 px-4">Становись другом</h1>
    <div
        class="relative overflow-hidden bg-cover bg-no-repeat text-center px-4" 
    >
        <!-- VK Widget -->
        <div id="vk_groups"></div>
    </div>
</template>