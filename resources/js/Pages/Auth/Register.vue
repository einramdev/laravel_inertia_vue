<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const submit = () => {
    form.post(route('register'), {
        onError: () => form.reset('password', 'password_confirmation'),
    });
};

</script>

<template>

    <Head title="Register"></Head>

    <h1 class="my-6 text-center text-3xl font-bold leading-9 text-slate-900">Register a new account</h1>

    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <div class="mb-6">
                <label for="name">Name</label>
                <input type="text" v-model="form.name" name="name" id="name"
                    class="block w-full rounded-md border-0 p-2 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-500 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm bg-white">
                <small>{{ form.errors.name }}</small>
            </div>

            <div class="mb-6">
                <label for="email">Email</label>
                <input type="text" v-model="form.email" name="email" id="email"
                    class="block w-full rounded-md border-0 p-2 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-500 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm bg-white">
                <small>{{ form.errors.email }}</small>
            </div>

            <div class="mb-6">
                <label for="password">Password</label>
                <input type="password" v-model="form.password" name="password" id="password"
                    class="block w-full rounded-md border-0 p-2 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-500 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm bg-white">
                <small>{{ form.errors.password }}</small>
            </div>

            <div class="mb-6">
                <label for="confirmpassword">Confirm Password</label>
                <input type="password" v-model="form.password_confirmation" name="confirmpassword" id="confirmpassword"
                    class="block w-full rounded-md border-0 p-2 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-500 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm bg-white">
            </div>
            <div>
                <p class="text-slate-600 mb-2">Already a user? <a href="#" class="text-link">Login</a></p>
                <button class="primary-btn" :disabled="form.processing">Register</button>
            </div>
        </form>
    </div>

</template>