<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import {Head} from '@inertiajs/vue3';
import ArticleShortComponent from "@/Components/ArticleShortComponent.vue";

defineProps({
    articles: Array
});

</script>

<template>
    <Head title="Home Article"/>
    <MainLayout>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <template v-for="(article, index  ) in articles" :key="index">
                <ArticleShortComponent :article="article"/>
            </template>
        </div>
    </MainLayout>
</template>
