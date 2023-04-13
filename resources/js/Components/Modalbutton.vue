<template>
    <button
        data-tooltip-target="tooltipbackform"
        data-modal-target="formbackmodal" data-modal-toggle="formbackmodal"
        type="submit"
        class="
        m-auto
        my-1
        w-1/2
        flex justify-center
        px-5
        py-2
        text-md
        font-medium
        text-center text-white
        bg-blue-700
        rounded-lg
        focus:ring-4 focus:ring-blue-200
        dark:focus:ring-blue-900
        hover:bg-blue-800
        "
    >
        мой случай
    </button>

    <div id="tooltipbackform" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        Запись на консультацию
    <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</template>