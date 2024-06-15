<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm} from '@inertiajs/vue3';
import { ref } from 'vue'
import Textinput from '../Components/TextField.vue'
import miniAuthLayout from '../Components/miniAuthLayout.vue'
import SecondaryButton from '../Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';

defineProps({
    // prop: {
    //     type: Boolean,
    // },
});
const questions = ref(1);
const options = ref(2);
const form = useForm({
    listTitle: '',
    listDesc: '',
    questions: {},
    options: {},
});

const submit = () => {
    form.post(route('list.create'));
};
</script>
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <miniAuthLayout>
            <form @submit.prevent="submit">
                <div>
                <Textinput 
                    type="text" 
                    placeholder="Check Lisst Title"
                    v-model="form.listTitle"
                    required
                />
                <Textinput 
                    type="text" 
                    class="w-full h-64"
                    placeholder="Desscription"
                    v-model="form.listDesc"
                    required
                />
            </div>
            <table>
                <tr>
                    <th></th>
                    <th style="width: 100px; height: 100px;" v-for="option in options" :key="option">
                        <Textinput 
                        type="text" 
                        :placeholder="'option'+option" 
                        class="w-full"
                        v-model="form.options[option]"
                        required
                        />    
                    </th>
                    <th style="width: 0px; height: 85.45px;">
                        <div>
                            <SecondaryButton v-on:click="options++" v-if="options<5">+</SecondaryButton>
                            <SecondaryButton   v-on:click="options--" v-if="options>2">-</SecondaryButton>
                        </div>
                    </th>
                </tr>
                <tr v-for="question in questions" :key="question">
                    <th>
                        <Textinput 
                        type="text" 
                        :placeholder="'question'+question" 
                        class="w-full"
                        v-model="form.questions[question]"
                        required
                        />    
                    </th>
                    <th v-for="option in options" :key="option"></th>
                </tr>
                <tr>
                    <th>
                        <div>
                <SecondaryButton v-on:click="questions++" v-if="questions<10">Добавить вопрос в список</SecondaryButton>
                <SecondaryButton   v-on:click="questions--" v-if="questions>1">Убрать вопрос из списка</SecondaryButton>
            </div>
                    </th>
                </tr>
            </table>
            <DangerButton>Отправить</DangerButton>
            </form>
        </miniAuthLayout>
    </AuthenticatedLayout>
</template>

<style>
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