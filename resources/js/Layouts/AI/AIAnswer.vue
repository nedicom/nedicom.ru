<script setup>
const props = defineProps({
    aianswer: String,
});
</script>

<template>
        <div  class="grid grid-cols-1 gap-9">
                <div
                class=""
                >
                <div
                class="                    
                min-w-full
                p-6
                bg-white
                max-w-sm
                flex flex-col
                "
            >
             <div>
                    <p     
                        class="hover:underline flex flex-justify items-center"
                        >
                        <img src="https://nedicom.ru/storage/usr/87/avatar/1702115295avatar.webp" width="40" class="rounded-full"/>
                        <p class="text-gray-700 text-base line-clamp-3 h-min-24 ml-2">
                            ИИ (Андрей)
                        </p>
                    </p>  
                </div> 
                    <p class="text-gray-700 text-base h-min-24 my-2">
                     {{aianswer }}
                    </p>
                    
                   <div class="flex justify-center items-center space-x-4">
                        <slot></slot>
                    </div>                   

        </div>
        
        </div>
    </div>
</template> 