<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import ArticleShortComponent from "@/Components/ArticleShortComponent.vue";
import {Head} from "@inertiajs/vue3";

defineProps({
    articles: Array
});

</script>

<template>
    <Head title="All Article"/>
    <MainLayout>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <template v-for="(article, index  ) in articles.data" :key="index">
                <ArticleShortComponent :article="article"/>
            </template>
        </div>

        <div class="flex flex-col items-center">
            <!-- Help text -->
            <span class="text-sm text-gray-700 dark:text-gray-400">
      Showing <span class="font-semibold text-gray-900 dark:text-white">{{ articles.current_page }}   </span> to <span
                class="font-semibold text-gray-900 dark:text-white">{{ articles.to }} </span> of <span
                class="font-semibold text-gray-900 dark:text-white">{{ articles.total }}  </span> Entries
  </span>
            <!-- Buttons -->
            <div class="inline-flex mt-2 xs:mt-0">
                <a :href="articles.prev_page_url"
                   class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 rounded-s hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Prev
                </a>
                <a :href="articles.next_page_url"
                   class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Next
                </a>
            </div>
        </div>
    </MainLayout>
</template>
