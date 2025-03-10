<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
});

const textarea = ref(null);

onMounted(() => {
    if (textarea.value.hasAttribute('autofocus')) {
        textarea.value.focus();
    }
});

defineExpose({ focus: () => textarea.value.focus() });
</script>

<template>
    <textarea class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
        v-model="model"
        ref="textarea">
    </textarea>
</template>
