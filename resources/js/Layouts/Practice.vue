<template>
    <!-- practice -->
        <h1 class="my-6 md:py-12 py-6 text-4xl font-semibold text-grey text-center">Делюсь успехами с Вами</h1>

        <div id="indicators-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-auto overflow-hidden rounded-lg h-screen">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="flex h-full md:flex-row flex-col">
                        <div class="md:basis-1/2 h-full">
                            <img src="/storage/images/landing/main/dec1.jpg" class="h-auto" alt="">
                        </div>
                        <div class="md:basis-1/2 h-full flex flex-wrap items-center justify-center">
                            <div>                            
                                <h3 class="text-3xl w-full p-5">Признали право на пенсию</h3>
                                <p class="w-full p-5">Пенсионный Фонд нередко отказывает в назначении пенсии при достижении возраста. 
                                    Как правило, причинами становится отсуствие стажа или необходимых документов. 
                                В суде мы можем доказать не только наличие или отсуствие стажа, но установить принадлежность документов.
                                Примечательно, что по нашим искам, суд назначает пенсию с момента обращения.
                            </p>
                            </div>  
                        </div>
                    </div> 
                </div>

                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="flex h-full md:flex-row flex-col">
                        <div class="md:basis-1/2 h-full">
                            <img src="/storage/images/landing/main/dec1.jpg" class="h-auto" alt="">
                        </div>
                        <div class="md:basis-1/2 h-full flex flex-wrap items-center justify-center">
                            <div>                            
                                <h3 class="text-3xl w-full p-5">Признали право на пенсию</h3>
                                <p class="w-full p-5">Пенсионный Фонд нередко отказывает в назначении пенсии при достижении возраста. 
                                    Как правило, причинами становится отсуствие стажа или необходимых документов. 
                                В суде мы можем доказать не только наличие или отсуствие стажа, но установить принадлежность документов.
                                Примечательно, что по нашим искам, суд назначает пенсию с момента обращения.
                            </p>
                            </div>  
                        </div>
                    </div> 
                </div>
               
            </div>



            <div class="flex justify-center items-center pt-4">
                <button type="button" class="flex justify-center items-center mr-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Вперед</span>
                    </span>
                </button>
                <button type="button" class="flex justify-center items-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Назад</span>
                    </span>
                </button>
            </div>
        </div>
    <!-- practice -->
</template>