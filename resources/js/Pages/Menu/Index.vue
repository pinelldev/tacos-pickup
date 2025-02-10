<template>
    <Head title="Categories" />

    <AuthenticatedLayout>
        <template #header>
            <h1>Menu</h1>
        </template>
    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router, useForm } from '@inertiajs/vue3';
</script>