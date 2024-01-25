<template>
    <Head :title="post.data.title" />
    <MainLayout>
        <div class="single-post">
            <div class="single-post__header">
                <div class="single-post__title">
                    <h1>{{ post.data.title }}</h1>
                    <p>{{ post.data.date }}</p>
                </div>
                <div class="post-preview__image">
                    <img :src="post.data.preview_image" :alt="post.data.title">
                </div>
            </div>

            <div class="main-content">
                <div class="single-post__container">
                    <div class="single-post__image">
                        <img :src="post.data.image" :alt="post.data.title">
                    </div>
                    <div class="single-post__body" v-html="post.data.content"></div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import {Head, Link} from '@inertiajs/vue3'
import {onMounted} from "vue";
import MainLayout from '@/Layouts/MainLayout.vue';

const props = defineProps({
   post: Object
});
console.log(props.post);
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
.single-post {
    margin-top: 30vh;
}

.single-post__container {
    display: flex;
    flex-direction: column;
    width: 100%;
}
.single-post__header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 5px;
}
.single-post__title {
    text-shadow: 6px 6px 7px rgba(46,5,80,0.71);
    color: #ffffff;
    font-weight: 600;
    padding-left: 70px;
}
.post-preview__image {
    padding-right: 70px;
    transform: scale(.8);
}

.post-preview__image img {
    box-shadow: 0px 0px 26px 5px rgba(0,0,0,0.4);
    border-radius: 20px;
}
.single-post__image {
    text-align: center;
    width: 100%;
    margin-bottom: 50px;
}
</style>
