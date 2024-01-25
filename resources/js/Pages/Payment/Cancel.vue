<template>
    <div class="payment-cancel">
        <h1>Cancel</h1>
    </div>
</template>

<script setup>
import {onMounted} from "vue";
import {router} from "@inertiajs/vue3";

onMounted(() => {
    setTimeout(()=> {
        router.visit(route('index'))
    },1000)
})
</script>

<style scoped>
.payment-cancel {
    display: flex;
    justify-content: center;
    margin-top: 300px;
}
.payment-cancel h1 {
    font-size: 40px;
    text-transform: uppercase;
    color: #5c051c;
    text-shadow: 4px 4px 15px rgba(198, 109, 109, 0.69);
}
</style>
