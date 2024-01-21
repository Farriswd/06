<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    name: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <div class="container flex-c-c">
            <div class="login">
                <form @submit.prevent="submit">
                    <div class="formGroup">
                        <p>Login</p>

                        <TextInput
                            id="name"
                            type="text"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="formGroup">
                        <p>Password</p>

                        <TextInput
                            id="password"
                            type="password"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
                        />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="block mt-4">
                        <label class="flex items-center">
                            <Checkbox name="remember" v-model:checked="form.remember" />
                            <span class="ms-2 text-sm text-gray-600">Remember me</span>
                        </label>
                    </div>

                    <div>
                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class=""
                        >
                            Forgot your password?
                        </Link>

                        <PrimaryButton class="ms-4" :disabled="form.processing">
                            <div v-if="form.processing" class="loader loader-sm">
                                <div class="inner one"></div>
                                <div class="inner two"></div>
                                <div class="inner three"></div>
                            </div>
                            Log in
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
</template>
