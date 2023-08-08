<script>
import { ref } from 'vue'
import VKOpenApi from '@/VKOpenApi.js'

export default {
    setup() {
        const status = ref('loading')

        VKOpenApi.then(() => {
            status.value = 'Script loaded'
            VK.Widgets.Group('vk_groups', {mode: 3}, 20003922)
        })

        return {
            status
        }
    }
}
</script>

<template>
    <!-- secondary banner - testimonials -->
    <h1 class="text-4xl font-semibold text-grey text-center py-10">Наши друзья, клиенты и партнеры</h1>
    <div
        class="relative overflow-hidden bg-cover bg-no-repeat my-9 p-12 text-center h-96"
    >
        <!-- VK Widget -->
        <div id="vk_groups"></div>
    </div>
    <!-- secondary banner - testimonials -->
</template>