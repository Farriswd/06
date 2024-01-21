<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import {computed} from "vue";

const props = defineProps({
    news: Object
});

const newsEvents = computed(() => props.news.filter(post => post.category === 'Event'));

</script>

<template>
    <Head title="Welcome" />
<MainLayout>
    <div class="flex-s block">
        <div class="newsBlock">
            <h2 class="content-title white-title">News <a href="#" class="more"><span></span><span></span></a></h2>
            <div class="newsFeed flex-s">
                <template v-if="news.length > 0">
                    <a v-for="post in news" :key="post.id" href="#" class="news" :style="`background-image: url(${post.preview_image})`">
                        <div class="news-info">
                            <h3><span>[{{ post.category }}]</span> {{ post.title }}</h3>
                            <div class="date">{{ post.date }}</div>
                        </div>
                    </a>
                </template>
                <template v-else>
                    <h2>No news!</h2>
                </template>
            </div>
        </div>
        <div class="eventsBlock">
            <h2 class="content-title white-title">Events <a href="#" class="more"><span></span><span></span></a></h2>
            <!-- Swiper -->
            <template v-if="newsEvents.length > 0">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div v-for="newsEvent in newsEvents" :key="newsEvent.id" class="swiper-slide">
                            <a href="" class="swiper-link">
                                <img :src="newsEvent.event_image" :alt="newsEvent.title">
                                <p>{{ newsEvent.title }}</p>
                            </a>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div><!--swiper-container-->
            </template>
            <template v-else>
                <h2>No Events</h2>
            </template>
        </div>
    </div><!--block-->
    <div class="block blockBorder">
        <h2 class="content-title dark-title">Find out our streamers</h2>
        <div class="flex streamBlock">
            <a href="" class="twitchBlock">
                <img src="/assets/images/twitch-icon.png" alt="Twitch">
            </a>
            <a href="" class="youtubeBlock">
                <img src="/assets/images/youtube-icon.png" alt="Youtube">
            </a>
        </div>
    </div><!--block-->
    <div class="contentHome">
        <h1>Content</h1>
        <h3>Check out what makes "Giran" special</h3>
        <a href="" class="block-a blockPvp">
            <div class="buttonPlay"><span></span></div>
            Intense PvP
        </a>
        <div class="flex">
            <div class="blockExp">
                <a href="" class="block-a blockSolo">
                    <div class="buttonPlay buttonPlay-small"><span></span></div>
                    Good  for solo players
                </a>
                <a href="" class="block-a blockRaids">
                    <div class="buttonPlay buttonPlay-small"><span></span></div>
                    Best Raid Bosses
                </a>
            </div>
            <a href="" class="block-a blockUpdate">
                <div class="buttonPlay"><span></span></div>
                Best Updates
            </a>
        </div>
        <div class="allContent">
            <a href="" class="button button-not-bg">See all content</a>
        </div>
    </div><!--contentHome-->
</MainLayout>
</template>

<style>

</style>
