<template>
    <Teleport to="body">
        <div v-if="isVisible" class="fixed top-0 left-0 w-full h-full bg-[#00000066] flex justify-center items-center z-0" @click.self="close">
            <div class="bg-white rounded-[8px] w-[90%] max-w-[500px] p-4 custom-shadow">
                <header class="flex items-start mb-4 justify-between">
                    <h3>{{ title }}</h3>
                    <button @click="close" class="bg-none border-none text-base cursor-pointer">&times;</button>
                </header>
                <section class="mb-1">
                    <slot></slot>
                </section>
                <footer class="text-right">
                    <slot name="footer"></slot>
                </footer>
            </div>
        </div>
        <!-- <div v-if="isVisible" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full" @click.self="close">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="bg-white rounded-[8px] w-[90%] max-w-[500px] p-4 custom-shadow">
                    <header class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ title }}</h3>
                        <button @click="close" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">&times;</button>
                    </header>
                    <section class="p-4 md:p-5">
                        <slot></slot>
                    </section>
                    <footer class="text-right">
                        <slot name="footer"></slot>
                    </footer>
                </div>
            </div>
        </div> -->
    </Teleport>
</template>

<script setup>
import { computed, defineProps, defineEmits } from 'vue';

const props = defineProps({
    modal: {
        type: Boolean,
        required: true
    },
    title: {
        type: String,
        default: 'Modal Title'
    }
});

const emit = defineEmits(['close']);

// const isVisible = computed(() => props.modal.isVisible);
const isVisible = computed(() => props.modal);

const close = () => {
    emit('close');
};

</script>