<template>
    <Head title="Shop" />
    <MainLayout>
        <h1 class="page-title">Shop</h1>
        <div class="main-content">
            <div class="categories">
                <div class="categories-list">
                    <ul v-if="categories.length > 0">
                        <li class="category-item">
                            <Link class="category-link" :class="{'active': !currentCategory}" :href="route('shop.index')">All</Link>
                        </li>
                        <li v-for="category in categories" :key="category.id" class="category-item">
                            <a @click.prevent="selectCategory(category.id)" class="category-link" :class="{'active': currentCategory && currentCategory === category.id}" href="#">{{ category.title }}</a>
                        </li>
                    </ul>
                    <template v-else>
                        <h3>No Categories</h3>
                    </template>
                </div>
            </div>
        <Products v-if="!isLoading" :products="products"/>
            <div v-else-if="isLoading" class="character-loading">
                <div class="loader violet">
                    <div class="inner one"></div>
                    <div class="inner two"></div>
                    <div class="inner three"></div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import {onBeforeUnmount, onMounted, ref, toRefs} from "vue";
import {Head, Link, router, usePage} from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue';
import Products from '@/Pages/Shop/Partials/Products.vue';

const props = defineProps({
    categories: Object,
    products: Object,
});
const currentCategory = ref(0);
const isLoading = ref(false);


const selectCategory = async (id) => {
    try {
        isLoading.value = true;
        currentCategory.value = id;
        await router.get(route('shop.index'), { category: id }, { preserveState: true, replace:true, preserveScroll:true })
        isLoading.value = false;
    } catch (error) {
        console.error('Error fetching products:', error);
    }
}

/** Get the category id from URL */
const handlePopstate = () => {
    const urlParams = new URLSearchParams(window.location.search);
    currentCategory.value = urlParams.has('category') ? parseInt(urlParams.get('category'), 10) : null;
};

console.log(props.products);
console.log(currentCategory.value);

onMounted(() => {
    /**
     * Init Get Category Id Function And Set Event Listener
     * */
    handlePopstate();
    window.addEventListener('popstate', handlePopstate);

    console.log(currentCategory.value);
    setTimeout(()=> {
        window.scrollTo({
            top: document.querySelector('.main-content').offsetTop - 200,
            behavior: 'smooth'
        })
    }, 150)
});

onBeforeUnmount(() => {
    /**
     * Delete Category change event listener
     * */
    window.removeEventListener('popstate', handlePopstate);
});
</script>

<style scoped>

</style>
