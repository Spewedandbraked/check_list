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
        <form @submit.prevent="submit">
        <miniAuthLayout>    <!-- title + description -->
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
        </miniAuthLayout>

        <miniAuthLayout>    <!-- quesstions -->
            <div v-for="question in questions" :key="question">
                <p>Question #{{ question }}</p>
                <Textinput 
                    type="text" 
                    placeholder="question" 
                    class="w-full"
                    v-model="form.questions[question]"
                    required
                />
            </div>
            <div>
                <SecondaryButton v-on:click="questions++" v-if="questions<10">Добавить вопрос в список</SecondaryButton>
                <SecondaryButton   v-on:click="questions--" v-if="questions>1">Убрать вопрос из списка</SecondaryButton>
            </div>
        </miniAuthLayout>

        <miniAuthLayout>    <!-- options -->
            <div class="flex" style="justify-content: space-around;">
                <div v-for="option in options" :key="option">
                    <p>Option #{{ option }}</p>
                    <Textinput 
                    type="text" 
                    placeholder="option" 
                    class="w-full"
                    v-model="form.options[option]"
                    required
                />
                </div>
            </div>
            <div>
                <SecondaryButton v-on:click="options++" v-if="options<5">Добавить вариант в список</SecondaryButton>
                <SecondaryButton   v-on:click="options--" v-if="options>2">Убрать вариант из списка</SecondaryButton>
            </div>
        </miniAuthLayout>

        <miniAuthLayout class="flex">
            <DangerButton>Отправить</DangerButton>
        </miniAuthLayout>
        </form>
    </AuthenticatedLayout>
    
</template>
