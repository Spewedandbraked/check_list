<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: false,
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });

defineProps(['placeholder'])
</script>

<template>
    <textarea
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm text-pretty"
        style="overflow-wrap: break-word;"
        v-model="model"
        ref="input"
        :placeholder="placeholder"
    />
</template>
