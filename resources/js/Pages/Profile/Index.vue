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
            <h3>H3 Page title</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
<!--            <p><img src="images/page-test-img.jpg" alt=""></p>-->
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a <a href="">galley of type and scrambled it to make a type specimen book</a>. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <form>
                <div class="formGroup">
                    <p>Choise realm:</p>
                    <select>
                        <option>Nightmare x50</option>
                        <option>Paradise x300</option>
                        <option>Warland x1000</option>
                    </select>
                </div>
                <div class="formGroup">
                    <p>Field content:</p>
                    <input type="text" placeholder="Field">
                </div>
                <div class="formGroup">
                    <button>Button</button> <a href="" class="button">Button link</a>
                </div>
            </form>
            <table>
                <tbody>
                <tr>
                    <td>Table 1</td> <td>Table 2</td> <td>Table 3</td> <td>Table 4</td> <td>Table 5</td>
                </tr>
                <tr>
                    <td>Content 1</td> <td>Content 2</td> <td>Content 3</td> <td>Content 4</td> <td>Content 5</td>
                </tr>
                <tr>
                    <td>Table 1</td> <td>Table 2</td> <td>Table 3</td> <td>Table 4</td> <td>Table 5</td>
                </tr>
                <tr>
                    <td>Content 1</td> <td>Content 2</td> <td>Content 3</td> <td>Content 4</td> <td>Content 5</td>
                </tr>
                </tbody>
            </table>
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
