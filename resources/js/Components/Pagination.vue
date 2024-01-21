<template>
    <div v-show="pagination.last_page > 1" class="pagination">
        <template v-for="link in pagination.links" :key="link.label">
            <Link :class="{'active': link.active, 'd-none':!link.url}" :href="link.url ?? ''" v-html="link.label" :preserve-scroll="true"></Link>

        </template>


<!--        <a href="#">&laquo;</a>-->

<!--        <a class="active" href="#">2</a>-->
<!--        <a href="#">3</a>-->
<!--        <a href="#">4</a>-->
<!--        <a href="#">5</a>-->
<!--        <a href="#">6</a>-->
<!--        <a href="#">&raquo;</a>-->
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    pagination: Object
})
</script>

<style scoped>

</style>
