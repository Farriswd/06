<template>
    <div class="payment-success">
        <h1>Success</h1>
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
.payment-success {
    display: flex;
    justify-content: center;
    margin-top: 300px;
}
.payment-success h1 {
    font-size: 40px;
    text-transform: uppercase;
    color: #13571c;
    text-shadow: 4px 4px 15px rgba(151, 198, 109, 0.69);
}
</style>
