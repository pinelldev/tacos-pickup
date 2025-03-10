<script setup>
defineProps({
    text: {
        type: String,
        default: 'Guardar'
    },
    disabled: {
        type: Boolean,
        default: false
    }
})
</script>
<template>
    <button type="submit"
        class="inline-flex items-center rounded-md border border-transparent bg-blue-500 px-4 py-2 m-1 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-blue-600 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900"
    >
        {{ text }}
    </button>
</template>
