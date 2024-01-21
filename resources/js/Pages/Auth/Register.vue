<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
        <Head title="Register" />

        <div class="container flex-c-c">
            <div class="register">
                <form @submit.prevent="submit">
                    <div class="formGroup">
                        <p>Login</p>

                        <TextInput
                            id="name"
                            type="text"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="name"
                        />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="formGroup">
                        <p>Email</p>

                        <TextInput
                            id="email"
                            type="email"
                            v-model="form.email"
                            required
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="formGroup">
                        <p>Password</p>

                        <TextInput
                            id="password"
                            type="password"
                            v-model="form.password"
                            required
                            autocomplete="new-password"
                        />

                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="formGroup">
                        <p>Confirm password</p>

                        <TextInput
                            id="password_confirmation"
                            type="password"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                        />

                        <InputError class="mt-2" :message="form.errors.password_confirmation" />
                    </div>

                    <div>
                        <Link
                            :href="route('login')"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Already registered?
                        </Link>

                        <PrimaryButton :disabled="form.processing">
                            <div v-if="form.processing" class="loader loader-sm">
                                <div class="inner one"></div>
                                <div class="inner two"></div>
                                <div class="inner three"></div>
                            </div>
                            Register
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
</template>
