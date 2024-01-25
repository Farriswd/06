<template>
    <Head title="Payment" />
    <MainLayout>
        <div class="payment">
            <h1>Get some SA points here</h1>
            <div class="main-content">
                <h3>Hello, you can buy some SA points right here.</h3>
                <p>You should know 1 SA point costs 0.1 dollar (10 cents)</p>
                <form @submit.prevent="paymentSubmit">
                    <div class="formGroup">
                        <p>Enter quantity of points you need (min 1, max 10000)</p>
                        <input type="number" min="1" max="10000" v-model="form.quantity">
                    </div>
                    <button type="submit">Buy</button>
                    <span class="total">Total: {{ total }}</span><span class="cur"> $</span>
                </form>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import {onMounted, ref, watch} from "vue";

const total = ref(0.1);

const form = useForm({
   quantity: 1
});

const paymentSubmit = () => {
    if (form.quantity > 10000 || form.quantity < 1) return console.error('Invalid');
    form.post(route('payment.store'))
}

onMounted(() => {
    watch(() => form.quantity, (newQty, oldQty) => {
        total.value = newQty * 0.1;
    });
})

</script>

<style scoped>
.payment {
    margin-top: 200px;
}
.payment form span {
    font-weight: 600;
}
.total {
    margin-left: 20px;
}

.payment .cur {
    font-size: 18px;
}
</style>
