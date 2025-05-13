<script setup>

</script>

<template>
    <div>
        <header class="bg-slate-800 shadow-md">
            <nav class="p-5 max-w-screen-lg mx-auto flex items-center justify-between">
                <div class="space-x-6">
                    <Link :href="route('home')" class="font-semibold text-white hover:text-blue-600">Home</Link>
                </div>
                <div class="space-x-6">
                    <Link :href="route('register')" class="font-semibold text-white hover:text-blue-600">Register</Link>
                    <Link :href="route('login')" class="font-semibold text-white hover:text-blue-600">Login</Link>
                </div>
            </nav>
        </header>

        <main class="p-4">
            <slot></slot>
        </main>
    </div>
</template>

<style lang="css" scoped>
@reference "/home/einram/testworks/laravel_inertia_vue/resources/css/app.css";
</style>