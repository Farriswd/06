<template>
    <div class="products">
        <div v-if="products.data.length > 0" class="products-list">
            <div v-for="(product, index) in products.data" :key="product.id" class="product-card">
                <div class="card-image">
                    <img :src="product.image" :alt="product.title">
                </div>
                <div class="card-body">
                    <h4>{{ product.title }}</h4>
                    <p>{{ product.description }}</p>
                </div>
                <div class="card-footer">
                    <p>{{ product.price }} <span>SA</span></p>
                    <button @click.prevent="addToCart(product, index)" class="button" :disabled="isProcessing[index]">
                        <span v-if="!isProcessing[index]">Add to Cart</span>
                        <span v-else v-html="loaderHtml"></span>
                    </button>
                </div>
            </div>
        </div>
        <div v-else>
            <h3>No Products</h3>
        </div>
    </div>
    <div class="pagination">
        <Pagination :pagination="products.meta" />
    </div>
</template>

<script setup>
import {router, usePage, Link, useForm} from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import {reactive, ref} from "vue";
import Pagination from '@/Components/Pagination.vue';
const props = defineProps({
    products: Object
});

const isProcessing = ref([]);
const loaderHtml = ref(`
      <div class="loader loader-sm">
        <div class="inner one"></div>
        <div class="inner two"></div>
        <div class="inner three"></div>
      </div>
    `);

/**
 * Add to Cart functions
 * */
const addToCart = async (product, index) => {
    isProcessing.value[index] = true;

    await router.post(route('shop.cart.store'), {id: product.id, quantity: 1},{
        onSuccess: (page) => {
            isProcessing.value[index] = false;
            Swal.fire({
                title: 'Success',
                text: 'Product added successfully!',
                icon: 'success',
                confirmButtonText: 'Ok'
            })
        },
        preserveScroll: true,
    });

}
</script>

<style scoped>
.pagination {
    margin-top: 30px;
}
</style>
