<template>
<h2>Characters List</h2>
    <div class="responsive">
        <div v-if="isLoading" class="character-loading">
            <div class="loader violet">
                <div class="inner one"></div>
                <div class="inner two"></div>
                <div class="inner three"></div>
            </div>
        </div>
        <table v-if="!isLoading">
            <thead>
            <th>Name</th>
            <th>Class</th>
            <th>Race</th>
            <th>Level</th>
            <th>Server</th>
            </thead>
            <tbody>
            <tr v-for="character in characters" :key="character.sid">
                <td>{{ character.name }}</td>
                <td><img v-if="character.job > '0'" :src="character.job" alt=""></td>
                <td>{{ character.race }}</td>
                <td>{{ character.lv }}</td>
                <td>{{ character.server_name }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
const props = defineProps({
    isLoading: Boolean,
    characters: Object
});
</script>

<style scoped>
table {
    width: 100%;
    overflow-x: scroll;
}
</style>
