<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../Components/TextInput.vue';


const form = useForm({
    email: null,
    password: null,
    remember: null,
});

const submit = () => {
    form.post(route('login'), {
        onError: () => form.reset('password', 'remember'),
    });
};

</script>

<template>

    <Head title="Login"></Head>

    <h1 class="my-6 text-center text-3xl font-bold leading-9 text-slate-900">Login to your account</h1>

    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">

            <TextInput name="email" type="email" v-model="form.email" :message="form.errors.email" />

            <TextInput name="password" type="password" v-model="form.password" :message="form.errors.password" />

            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center gap-2">
                    <input type="checkbox" v-model="form.remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>

                <p class="text-slate-600">Need an account? <a :href="route('register')"
                        class="font-semibold text-blue-500 hover:text-blue-600">Register</a>
                </p>
            </div>

            <div> 
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full"
                    :disabled="form.processing">Log in</button>
            </div>
        </form>
    </div>

</template>