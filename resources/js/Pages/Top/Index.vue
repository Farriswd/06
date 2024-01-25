<template>
    <Head title="Top" />
<MainLayout>
    <h1 class="page-title">Top 100 of "<span class="server-title">{{ server.title }}</span>"</h1>
    <div class="main-content">
        <div v-if="isLoading" class="character-loading">
            <div class="loader violet">
                <div class="inner one"></div>
                <div class="inner two"></div>
                <div class="inner three"></div>
            </div>
        </div>
        <div v-if="!isLoading" class="characters">
            <div v-if="characters.length > 0" class="characters-list">
                <table>
                    <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Level</th>
                    <th>Race</th>
                    </thead>
                    <tbody>
                    <tr v-for="(character, index) in characters" :key="character.sid">
                        <td>{{ index + 1 }}</td>
                        <td>{{ character.name }}</td>
                        <td><img :src="character.job" :alt="character.name"></td>
                        <td>{{ character.lv }}</td>
                        <td>{{ character.race }}</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import {Head, Link, usePage} from '@inertiajs/vue3'
import {onMounted, ref} from "vue";

const props = defineProps({
   server: Object
});

const isLoading = ref(true)
const characters = ref(null)

onMounted(async () => {
    setTimeout(()=> {
        window.scrollTo({
            top: document.querySelector('.main-content').offsetTop - 200,
            behavior: 'smooth'
        })
    }, 150)
    characters.value = await usePage().props.characters.data;
    isLoading.value = false;
})

</script>

<style scoped>
.server-title {
    color: #4b0678;
    text-shadow: 4px 4px 6px rgba(187, 0, 164, 0.85);
}
</style>
