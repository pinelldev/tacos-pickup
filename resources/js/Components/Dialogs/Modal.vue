<template>
    <Teleport to="body">
        <div v-if="isVisible" class="fixed top-0 left-0 w-full h-full bg-[#00000066] flex justify-center items-center z-0" @click.self="emit('onCancel')">
            <div class="bg-white rounded-[8px] w-[90%] max-w-[500px] p-4 custom-shadow">
                <header class="flex items-center mb-4 justify-between">
                    <h3>{{ title }}</h3>
                    <button @click="emit('onCancel')" class="bg-none border-none text-base cursor-pointer">&times;</button>
                </header>
                <form class="" @submit.prevent="emit('onSubmit')">
                    <section class="">
                        <slot></slot>
                    </section>
                    <div class="text-right">
                        <BtnCancel @click="emit('onCancel')" :text="isForm ? 'Cancelar' : 'Cerrar'"/>
                        <BtnPrimary v-if="isForm && !isEdit" :disabled="disableSubmit" :text="'Guardar'"/>
                        <BtnPrimary v-if="isForm && isEdit" :disabled="disableSubmit" :text="'Actualizar'"/>
                    </div>
                </form>
            </div>
        </div>
    </Teleport>
</template>

<script setup>
import { computed, defineProps, defineEmits } from 'vue';
import BtnCancel from './BtnCancel.vue';
import BtnPrimary from './BtnPrimary.vue';

const props = defineProps({
    modal: {
        type: Boolean,
        required: true
    },
    title: {
        type: String,
        default: 'Modal Title'
    },
    isForm: {
        type: Boolean,
        required: false,
        default: true,
    },
    isEdit: {
        type: Boolean,
        default: false,
    },
    disableSubmit: {
        type: Boolean,
        default: false,
    },
});

const emit = defineEmits(['onSubmit', 'onCancel'])

// const isVisible = computed(() => props.modal.isVisible);
const isVisible = computed(() => props.modal)
</script>