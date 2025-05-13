<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../Components/TextInput.vue';


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
            <TextInput name="name" v-model="form.name" :message="form.errors.name" />

            <TextInput name="email" type="email" v-model="form.email" :message="form.errors.email" />

            <TextInput name="password" type="password" v-model="form.password" :message="form.errors.password" />

            <TextInput name="confirm password" type="password" v-model="form.password_confirmation" />

            <div>
                <p class="text-slate-600 mb-2">Already a user? <a :href="route('login')"
                        class="font-semibold text-blue-500 hover:text-blue-600">Login</a></p>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    :disabled="form.processing">Register</button>
            </div>
        </form>
    </div>

</template>