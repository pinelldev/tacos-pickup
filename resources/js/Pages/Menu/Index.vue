<template>
    <Head title="Menu" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Menu
                </h2>
                <PrimaryButton @click="showModal = true">
                    Agregar al Menu
                </PrimaryButton>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="p-3">
                            <SearchComponent @search="searchMenu" :url="route('menu.index')" :only="['menu']"/>
                        </div>
                        <table class="table-fixed w-full border-collapse">
                            <thead>
                                <tr>
                                    <th class="text-left border-b">#</th>
                                    <th class="text-left border-b">Nombre</th>
                                    <th class="text-left border-b">Categoria</th>
                                    <th class="text-left border-b">Precio</th>
                                    <th class="text-left border-b">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(men, index) in menu.data" :key="men.id">
                                    <td>
                                        {{ index + 1 }}
                                    </td>
                                    <td>
                                        {{ men.name }}
                                    </td>
                                    <td>
                                        {{ men.category.name }}
                                    </td>
                                    <td>
                                        C${{ men.price }}
                                    </td>
                                    <td>
                                        <button @click="edit(men)" class="rounded-full text-white bg-blue-600 hover:bg-blue-700 px-3 py-2 m-1">
                                            <font-awesome-icon icon="pen-to-square" />
                                        </button>
                                        <button @click="remove(men)" class="rounded-full text-white bg-red-600 hover:bg-red-700 px-3 py-2 m-1">
                                            <font-awesome-icon icon="trash" />
                                        </button>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <Pagination :data="menu" />
                </div>
            </div>
            <Modal :modal="showModal" @onSubmit="save" @onCancel="resetForm" title="Agregar al menu" :isEdit="!isNew">
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-1/2 px-4 mb-3">
                        <InputLabel value="Categoria"/>
                        <select v-model="form.category_id" class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option autofocus disabled>Seleccione categoria</option>
                            <option v-for="category in categories" :key="category.id" :value="category.id">
                                {{ category.name }}
                            </option>
                        </select>
                        <InputError v-if="form.errors.category_id" :message="form.errors.category_id" />
                    </div>

                    <div class="w-full lg:w-1/2 px-4 mb-3">
                        <InputLabel value="Nombre"/>
                        <TextInput v-model="form.name"/>
                        <InputError v-if="form.errors.name" :message="form.errors.name" />
                    </div>
                    <div class="w-full lg:w-1/2 px-4 mb-3">
                        <InputLabel value="Descripcion"/>
                        <TextArea v-model="form.description"/>
                    </div>
                    <div class="w-full lg:w-1/2 px-4 mb-3">
                        <InputLabel value="Precio"/>
                        <TextInput v-model="form.price" type="number"/>
                        <InputError v-if="form.errors.price" :message="form.errors.price" />
                    </div>
                </div>
            </Modal>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router, useForm } from '@inertiajs/vue3';
import Modal from '@/Components/Dialogs/Modal.vue';
import { ref } from 'vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import useNotify from '@/use/useNotify';
import Pagination from '@/Components/Pagination.vue';
import SearchComponent from '@/Components/Dialogs/SearchComponent.vue';

const props = defineProps({
    menu: {
        type: Object,
        required: true
    },
    categories: {
        type: Array,
        required: true
    },
})

const showModal = ref(false)
const isNew = ref(true)

function resetForm() {
    form.reset();
    isNew.value = true;
    showModal.value = false;
}

const form = useForm({
    id: null,
    category_id: null,
    name: '',
    description: '',
    price: null
})

const notify = useNotify();

const searchMenu = (search) => {
    router.get(route('menu.index'), { search: search }, {
        preserveState: true,
        preserveScroll: true,
        only: ['menu'],
        replace: true
    })
}


const save = () => {
    if (isNew.value) {
        form.post(route('menu.store'), {
            preserveScroll: true,
            onSuccess: () => {
                resetForm();
                notify.success('Agregado al menu correctamente');
            },
        })
    } else {
        form.put(route('menu.update', form.id), {
            preserveScroll: true,
            onSuccess: () => {
                resetForm();
                notify.success('Modificado en el menu correctamente');
            },
        })
    }
}

const remove = (menu) => {
    notify.confirm(() => {
        router.delete(route('menu.destroy', { menu: menu.id } ), {
            onSuccess: () => {
                notify.success('Platillo eliminado correctamente');
            }
        }); 
    }, '¿Estás seguro de eliminar este platillo del menu?');
}


function edit(menu) {
    isNew.value = false;
    form.id = menu.id;
    form.category_id = menu.category?.id;
    form.name = menu.name;
    form.description = menu.description;
    form.price = menu.price;
    showModal.value = true;
}
</script>