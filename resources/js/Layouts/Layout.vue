<script setup>

</script>

<template>
    <div>
        <header class="bg-slate-800 shadow-md">
            <nav class="p-5 max-w-screen-lg mx-auto flex items-center justify-between">
                <div class="space-x-6">
                    <Link :href="route('home')" class="font-semibold text-white hover:text-blue-600" :class="[
                        route().current('home')
                            ? 'bg-gray-900 text-white'
                            : 'text-gray-300 hover:bg-gray-700 hover:text-white',
                        'rounded-md px-3 py-2 text-sm font-medium'
                    ]">Home
                    </Link>
                </div>
                <div v-if="$page.props.auth.user" class="space-x-6">
                    <Link :href="route('dashboard')" class="font-semibold text-white hover:text-blue-600" :class="[
                        route().current('dashboard')
                            ? 'bg-gray-900 text-white'
                            : 'text-gray-300 hover:bg-gray-700 hover:text-white',
                        'rounded-md px-3 py-2 text-sm font-medium'
                    ]">Dashboard
                    </Link>
                    <Link :href="route('logout')" method="post" as="button" type="button"
                        class="font-semibold text-white hover:text-blue-600">
                    Logout</Link>
                </div>
                <div v-else class="space-x-6">
                    <Link :href="route('register')" class="font-semibold text-white hover:text-blue-600" :class="[
                        route().current('register')
                            ? 'bg-gray-900 text-white'
                            : 'text-gray-300 hover:bg-gray-700 hover:text-white',
                        'rounded-md px-3 py-2 text-sm font-medium'
                    ]">Register</Link>
                    <Link :href="route('login')" class="font-semibold text-white hover:text-blue-600" :class="[
                        route().current('login')
                            ? 'bg-gray-900 text-white'
                            : 'text-gray-300 hover:bg-gray-700 hover:text-white',
                        'rounded-md px-3 py-2 text-sm font-medium'
                    ]">Login</Link>
                </div>
            </nav>
        </header>

        <main class="p-4">
            <slot></slot>
        </main>
    </div>
</template>