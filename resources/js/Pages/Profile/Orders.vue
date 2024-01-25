<template>
    <MainLayout>
        <Head title="Profile" />
        <h1 class="page-title">My Orders</h1>
        <div class="main-content">
<!--            <h2>H2 Page title</h2>-->
            <div class="orders">
                <div v-if="orders.length > 0" class="orders-list">
                    <div v-for="order in orders" :key="order.id" class="order-card">
                        <div class="order-info">
                            <div class="order-info__header">
                                <span
                                    :class="{'success': order.status === 'success', 'error': order.status === 'error', 'new': order.status === 'new'}"
                                    class="order-status"
                                >{{ order.status }}</span>
                                <span class="order-date">{{ order.created_at }}</span>
                            </div>
                            <div class="order-info__number"># {{ order.id }}</div>
                        </div>
                        <div class="order-price">
                            {{ order.total_price }} <span class="currency">SA</span>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <h2>No orders</h2>
                </div>
            </div>

        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import {onMounted, ref} from "vue";
import {Head} from '@inertiajs/vue3'

const props = defineProps({
    orders: Object
});

// console.log(props.orders);

onMounted(() => {
        setTimeout(()=> {
            window.scrollTo({
                top: document.querySelector('.main-content').offsetTop - 200,
                behavior: 'smooth'
            })
        }, 150)
});

</script>

<style scoped>
.order-price {
    font-size: 18px;
    font-weight: 600;
}
.currency {
    font-weight: 500;
    color: #d0016a;
}
.orders-list {
    display: flex;
    flex-direction: column;
    row-gap: 30px;
}

.order-card {
    display: flex;
    align-items: center;
    justify-content: space-between;
    border: 1px solid #000000;
    padding: 20px;
}

.order-info {
    display: flex;
    flex-direction: column;
    row-gap: 10px;
}

.order-info__header {
    font-size: 14px;
}

.order-info__header .order-status{
    margin-inline-end: 10px;
    font-weight: 600;
}
.order-info__header .order-status.success {
    color: #67aa03;
    background: rgba(51, 255, 15, 0.2);
    padding: 5px;
}

.order-info__header .order-status.error {
    color: #aa0332;
    background: rgba(255, 15, 119, 0.2);
    padding: 5px;
}

.order-info__header .order-status.new {
    color: #0370aa;
    background: rgba(15, 235, 255, 0.2);
    padding: 5px;
}

.order-date {
    opacity: .8;
    font-size: 12px;
}

.order-info__number{
    font-weight: 600;
}
</style>
