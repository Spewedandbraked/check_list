<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import miniAuthLayout from '@/Components/miniAuthLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    list: {
        type: Object,
    },
});
</script>
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <miniAuthLayout>
            <div class="flex" style="justify-content: space-around; flex-wrap: wrap;">
                <div class="card p-6">
                    <div class="card-details">
                        <p class="text-title">{{ list.title }}</p>
                        <p class="text-body">{{ list.description }}</p>
                    </div>
                </div>
            </div>
        </miniAuthLayout>
    </AuthenticatedLayout>
</template>