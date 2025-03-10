<template>

    <Head title="Categories" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Categories
                </h2>
                <PrimaryButton @click="showModal = true">
                    Nueva Categoria
                </PrimaryButton>
                <!-- <button class="rounded bg-slate-600 hover:bg-slate-700 text-white text-center p-2" @click="showModal = true">
                    Nueva Categoria
                </button> -->
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table class="table-fixed w-full border-collapse">
                            <thead>
                                <tr>
                                    <th class="text-left border-b">#</th>
                                    <th class="text-left border-b">Categoria</th>
                                    <th class="text-left border-b">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(category, index) in categories.data" :key="category.id">
                                    <td>
                                        {{ index + 1 }}
                                    </td>
                                    <td>
                                        {{ category.name }}
                                    </td>
                                    <td>
                                        <!-- <button class="rounded-full text-white bg-blue-600 hover:bg-blue-700 px-3 py-2 m-1">
                                            <font-awesome-icon icon="pen-to-square" />
                                        </button> -->
                                        <button @click="removeCategory(category)" class="rounded-full text-white bg-red-600 hover:bg-red-700 px-3 py-2 m-1">
                                            <font-awesome-icon icon="trash" />
                                        </button>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <Pagination :data="categories" />
                </div>
            </div>
            <Modal :modal="showModal" @onSubmit="saveCategory" @onCancel="resetForm"  title="Agregar categoria">
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-1/2 px-4 mb-3">
                        <InputLabel value="Nombre"/>
                        <TextInput v-model="form.name"/>
                        <InputError v-if="form.errors.name" :message="form.errors.name"/>
                    </div>
                </div>
            </Modal>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from "@/Components/Pagination.vue";
import Modal from "@/Components/Dialogs/Modal.vue";
import { Head, router, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import useNotify from '@/use/useNotify';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import ButtonPrimary from '@/Components/Dialogs/BtnPrimary.vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    categories: {
        type: Object,
        required: true
    }
});

const showModal = ref(false);

const form = useForm({
    name: '',
});

const notify = useNotify();

function resetForm() {
    form.reset();
    showModal.value = false;
}
const saveCategory = () => {
    form.post(route('categories.store'), {
        preserveScroll: true,
        onSuccess: () => {
            showModal.value = false;
            form.reset();
            notify.success('Categoria creada');
        }
    });
};


const removeCategory = (category) => {
    notify.confirm(() => {
        router.delete(route('categories.destroy', { category: category.id } ), {
            onSuccess: () => {
                notify.success('Categoria eliminada correctamente');
            }
        }); 
    }, '¿Estás seguro de eliminar esta categoria?');
}
</script>