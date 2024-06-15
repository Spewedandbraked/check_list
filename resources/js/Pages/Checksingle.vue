<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import miniAuthLayout from '@/Components/miniAuthLayout.vue';
import DangerButton from '@/Components/DangerButton.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    list: {
        type: Object,
    },
    options: {
        type: Object,
    },
    questions: {
        type: Object,
    },
});

const form = useForm({
});

const remove = ($vabriale) => {
    form.delete(route('list.delete',[$vabriale]));
};
</script>
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <miniAuthLayout>
            <h1>{{ list.title }}</h1><br><h2>{{ list.description }}</h2>
            <table>
                <tr>
                    <th style="width: 75%;"></th><!-- empty -->
                    <th v-for="option in options" :key="option">{{ option.content }}</th>
                </tr>
                <tr v-for="question in questions" :key="question">
                    <th style="width: 75%;">{{ question.content }}</th>
                    <th v-for="option in options" :key="option"></th>
                </tr>
            </table>
        </miniAuthLayout>
        <miniAuthLayout>
            <form @submit.prevent="remove(list.id)">
                <button>Удалить</button>
            </form>
        </miniAuthLayout>
    </AuthenticatedLayout>
</template>

<style>
td, th {
  text-align: left;
}
table {
	width: 100%;
	margin-bottom: 20px;
	border: 1px solid #dddddd;
	border-collapse: collapse; 
}
th {
	font-weight: bold;
	padding: 5px;
	background: #efefef;
	border: 1px solid #dddddd;
}
td {
	border: 1px solid #dddddd;
	padding: 5px;
}
</style>