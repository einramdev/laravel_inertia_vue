<script setup>

const props = defineProps({
     user: {
        type: String,
        default: 'Texto default'
     }
});

</script>

<template>

    <Head title="About" />
        <div>
            <h1>About page. Hello {{ $page.props.auth.user }}</h1>
        </div>
</template>