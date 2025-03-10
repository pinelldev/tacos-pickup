<script setup>

defineProps({
    text: {
        type: String,
        default: 'Cancelar'
    }
})
</script>

<template>
    <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-red-600 px-4 py-2 m-1 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-red-700 focus:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-offset-2 active:bg-red-900">
        {{ text }}
    </button>
</template>