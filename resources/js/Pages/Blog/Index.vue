<template>
    <Head title="Blog" />
<MainLayout>
    <h1 class="page-title">Blog</h1>
    <div class="main-content">
        <div class="blog-section">
            <div class="posts">
                <div v-if="posts.data.length > 0" class="post-list">
                    <div v-for="post in posts.data" :key="post.id" class="post-card">
                        <div class="post-image">
                            <a href="#"><img :src="post.preview_image" :alt="post.title"></a>
                            <span>{{ post.date }}</span>
                        </div>
                        <div class="post-body">
                            <div class="post-title">
                                <h2><a href="">[{{ post.category }}] {{ post.title }}</a></h2>
                            </div>
                            <div class="post-description" v-html="post.content"></div>
                        </div>
                    </div>
                </div>
            </div>
            <Pagination :pagination="posts.meta"/>
        </div>
    </div>
</MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import {Head} from '@inertiajs/vue3'
import {onMounted} from "vue";

const props = defineProps({
   posts: Object
});

console.log(props.posts);

onMounted(() => {
    setTimeout(()=> {
        window.scrollTo({
            top: document.querySelector('.main-content').offsetTop - 200,
            behavior: 'smooth'
        })
    }, 150)
})

</script>

<style scoped>

</style>
