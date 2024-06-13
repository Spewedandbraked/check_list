<script>
import axios from 'axios';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Textinput from '../Components/TextInput.vue'
import miniAuthLayout from '../Components/miniAuthLayout.vue'
import SecondaryButton from '../Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import csrf from '../Components/csrf.vue'
export default{
  data(){
    return{
      questions: 1,    
      options:2,
      out: null,
      listTitle:null,
      listDesc:null,
      listQue:{},
      listOpt:{},
    }
  },
  components: {
    AuthenticatedLayout: AuthenticatedLayout,
    Head: Head,
    Textinput: Textinput,
    miniAuthLayout: miniAuthLayout,
    SecondaryButton: SecondaryButton,
    DangerButton: DangerButton,
    csrf: csrf,
  },
  methods:{
    post(){
        axios.get('/sanctum/csrf-cookie').then(response => {
            axios.post('/pagename2', {
            out: this.listQue
            })
        });
    }
  }
}



const getToken = async() =>{
    await axios.get('/sanctum/csrf-cookie')
}
const handleRequest = async() =>{
    await getToken();
    axios.post('/pagename2', {
        out: this.listQue
    })
}
  </script>
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <form @submit="handleRequest" method="POST">
        <csrf></csrf>
        <miniAuthLayout>    <!-- title + description -->
            <div class="">
                <Textinput v-model="listTitle" placeholder="Check Lisst Title" ></Textinput>
                <Textinput v-model="listDesc" placeholder="Desscription" class="w-full h-64"> </Textinput>
            </div> 
        </miniAuthLayout>

        <miniAuthLayout>    <!-- quesstions -->
            <div v-for="question in questions" :key="question">
                <p>Question #{{ question }}</p>
                <Textinput v-model="listQue[question]" placeholder="Desscription" class="w-full"> </Textinput>
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
                    <Textinput v-model="listOpt[option]" placeholder="Check Lisst Title" ></Textinput>
                </div>
            </div>
            <div>
                <SecondaryButton v-on:click="options++" v-if="options<5">Добавить вариант в список</SecondaryButton>
                <SecondaryButton   v-on:click="options--" v-if="options>2">Убрать вариант из списка</SecondaryButton>
            </div>
        </miniAuthLayout>

        <miniAuthLayout class="flex">
            <DangerButton  @click="transmit()">Отправить</DangerButton>
        </miniAuthLayout>
        </form>
        <SecondaryButton v-on:click="ss()">Добавить вариант в список</SecondaryButton>
        {{ listQue }}
        {{ listOpt }}
    </AuthenticatedLayout>
    
</template>
