<template>
    <div>
        <input @input="onInputBase($event.target.value)" 
                name="search"
                type="search" 
                id="default-search"
                :value="modelValue" 
                class="p-2 ps-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                placeholder="Buscar" 
        />

    </div>
</template>
<script setup>
import { debounce } from 'lodash';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    url: {
        type: String,
        required: false
    },
    only: {
        type: Array,
        required: false,
    },
    modelValue: {
        type: [String, Number], required: false
    },
})

const emit = defineEmits(['search', 'update:modelValue'])

const onInputBase = (value) => {
    emit('update:modelValue', value);
    onInput(value);
}

const onInput = debounce((value) => {
    if (props.url && props.only) {
        router.get(props.url, { search: value }, {
            preserveState: true,
            preserveScroll: true,
            only: props.only,
            replace: true,
        });
    } else {
        emit('search', value)
    }
}, 500)
</script>