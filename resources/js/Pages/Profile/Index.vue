<template>
    <MainLayout>
        <Head title="Profile" />
        <h1 class="page-title">Profile</h1>
        <div class="main-content">
<!--            <h2>H2 Page title</h2>-->
            <div>
                <CharactersList :isLoading="isLoading" :characters="accountCharacters" />
            </div>
            <div>
                <UpdatePasswordForm />
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue';
import CharactersList from '@/Pages/Profile/Partials/CharactersList.vue';
import {onMounted, ref} from "vue";
import {Head} from '@inertiajs/vue3'

const accountCharacters = ref({});
const isLoading = ref(false);
const getAllCharacters = async () => {
    isLoading.value = true;
    axios.get(route('profile.get.characters'))
    .then( res => {
        accountCharacters.value = res.data.data
        isLoading.value = false
    });
}


onMounted(() => {
        setTimeout(()=> {
            window.scrollTo({
                top: document.querySelector('.main-content').offsetTop - 200,
                behavior: 'smooth'
            })
        }, 150)
    getAllCharacters();
});

</script>

<style scoped>

</style>
