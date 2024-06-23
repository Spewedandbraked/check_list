<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import miniAuthLayout from '@/Components/miniAuthLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    lists: {
        type: Object,
    },
    cancreate:{
        type: Boolean,
        default: true,
    },
    admin:{
        type: Boolean,
        default: false,
    }
});
</script>
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout :admin=admin>
        <miniAuthLayout>
            <div class="flex" style="justify-content: space-around; flex-wrap: wrap;">
                <div v-for="list in lists" :key="list" class="p-6">
                    <div class="card">
                        <div class="card-details">
                            <p class="text-title">{{ list.title }}</p>
                            <p class="text-body">{{ list.description }}</p>
                        </div>
                        <a class="card-button" style="text-align: center;" :href="route('list.show',[list.id])">Открыть</a>
                    </div>
                </div>
                <div v-if="cancreate==true" class="p-6">
                    <div class="card" style="background-color: lightgreen;">
                        <div class="card-details">
                            <p class="text-title">+</p>
                        </div>
                        <a class="card-button" style="text-align: center;" :href="route('list.create')">Создать</a>
                    </div>
                </div>
            </div>
        </miniAuthLayout>
    </AuthenticatedLayout>
</template>
<style>
.card {
 width: 190px;
 height: 254px;
 border-radius: 20px;
 background: #f5f5f5;
 position: relative;
 padding: 1.8rem;
 border: 2px solid #c3c6ce;
 transition: 0.5s ease-out;
 overflow: visible;
}

.card-details {
 color: black;
 height: 100%;
 gap: .5em;
 display: grid;
 place-content: center;
}

.card-button {
 transform: translate(-50%, 125%);
 width: 60%;
 border-radius: 1rem;
 border: none;
 background-color: #008bf8;
 color: #fff;
 font-size: 1rem;
 padding: .5rem 1rem;
 position: absolute;
 left: 50%;
 bottom: 0;
 opacity: 0;
 transition: 0.3s ease-out;
}

.text-body {
 color: rgb(134, 134, 134);
}

/*Text*/
.text-title {
 font-size: 1.5em;
 font-weight: bold;
}

/*Hover*/
.card:hover {
 border-color: #008bf8;
 box-shadow: 0 4px 18px 0 rgba(0, 0, 0, 0.25);
}

.card:hover .card-button {
 transform: translate(-50%, 0%);
 opacity: 1;
}
</style>