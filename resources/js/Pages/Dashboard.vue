<script setup>

</script>
<template>
    <div>
        <p v-if="$page.props.flash.message" class="p-4 bg-green-200">{{ $page.props.flash.message }}</p>
        <h1 class="my-6 text-center text-3xl font-bold leading-9 text-slate-900">
            Welcome back {{ $page.props.auth.user.name }}
        </h1>
    </div>
</template>