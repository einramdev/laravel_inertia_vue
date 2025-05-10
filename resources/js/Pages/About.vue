<script setup>
import { defineProps } from "vue";

const props = defineProps({
     user: {
        type: String,
        default: 'Texto default'
     }
});

</script>

<template>
    <div>
        <h1>About page. Hello {{ user }}</h1>
    </div>
</template>