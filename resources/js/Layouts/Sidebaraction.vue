<template>

<div class="xl:w-2/6 sm:px-6 lg:px-4 fixed top-1/2 right-0 z-40 h-screen">
      <button
                  data-tooltip-target="tooltip1"                  
                  type="submit"
                  class="
                    m-auto
                    mt-12
                    w-1/2
                    flex justify-center
                    px-5
                    py-6
                    text-sm
                    font-medium
                    text-center text-white
                    bg-blue-700
                    rounded-lg
                    focus:ring-4 focus:ring-blue-200
                    dark:focus:ring-blue-900
                    hover:bg-blue-800
                  "
                >
                  Записаться на консультацию
                </button>

              <div id="tooltip1" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                  К юристу в Вашем городе
                <div class="tooltip-arrow" data-popper-arrow></div>
              </div>
        
              <button
                  data-tooltip-target="tooltip2"
                  data-modal-target="question-modal" data-modal-toggle="question-modal"
                  type="submit"
                  class="
                    m-auto
                    my-9
                    w-1/2
                    flex justify-center
                    px-5
                    py-6
                    text-sm
                    font-medium
                    text-center text-white
                    bg-blue-700
                    rounded-lg
                    focus:ring-4 focus:ring-blue-200
                    dark:focus:ring-blue-900
                    hover:bg-blue-800
                  "
                >
                  Задать вопрос онлайн  
                </button>

              <div id="tooltip2" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                  Ответ будет опубликован на сайте
                <div class="tooltip-arrow" data-popper-arrow></div>
              </div>
      </div>

</template>