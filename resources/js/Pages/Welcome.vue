<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Dashboard from './Dashboard.vue';
import Login from './Auth/Login.vue';
import Register from './Auth/Register.vue';
import { ref } from 'vue';
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
}
);
const currentTab = ref('Login')
const tabs = {
    Login,
    Register,
}


</script>
<template>
    <div v-if="canLogin">
        <div
            v-if="$page.props.auth.user"
            class="-max-w-full diplay:">
            <Dashboard cancreate="false"/>
        </div>
        <template v-else>
            <div class="flex flex-1 justify-center" style="position: absolute; width: 100%;">
                <button
                    v-for="(_, tab) in tabs"
                    :key="tab"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    @click="currentTab = tab"
                    >
                {{ tab }}
                </button>
            </div>
            <component :is="tabs[currentTab]"></component>
        </template>
    </div>
</template>
