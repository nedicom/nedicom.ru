<script type="text/javascript" src="https://vk.com/js/api/openapi.js?169"></script>

<template>
<!-- secondary banner - testimonials -->
<h1 class="text-4xl font-semibold text-grey text-center py-10">
    Наши друзья, клиенты и партнеры
  </h1>
  <div
    class="relative overflow-hidden bg-cover bg-no-repeat my-9 p-12 text-center h-96"
    >
        

        <!-- VK Widget -->
        <div id="vk_groups"></div>
            <component :is="'script'">
                VK.Widgets.Group("vk_groups", {mode: 3}, 20003922);
            </component>         
  </div> 
<!-- secondary banner - testimonials -->
</template>