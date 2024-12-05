<script setup>

defineProps({
    article: Object,
});
</script>

<template>
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src="https://placehold.co/600x400" alt=""/>
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a
                    :href="route('show', { id: article.id })"> {{ article.title }}</a></h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ article.short }}</p>

            <div class="flex flex-col items-center pb-10">
                <div class="flex mt-4 md:mt-6">
                    <div
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center      focus:ring-4 focus:outline-none focus:ring-blue-300  ">
                        <svg class="w-6 h-6 text-gray-800  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="M16 0H4a2 2 0 0 0-2 2v1H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4.5a3 3 0 1 1 0 6 3 3 0 0 1 0-6ZM13.929 17H7.071a.5.5 0 0 1-.5-.5 3.935 3.935 0 1 1 7.858 0 .5.5 0 0 1-.5.5Z"/>
                        </svg>
                        <strong>232</strong>
                    </div>
                    <div
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center      focus:ring-4 focus:outline-none focus:ring-blue-300  ">
                        <strong>232</strong> <a href="#">❤️</a>
                    </div>
                </div>
            </div>
            <p> теги:</p>
                <div class=" " v-for="tag in article.tags">
                    <div
                         class="inline-flex items-center px-4 py-2 text-sm font-medium text-center      focus:ring-4 focus:outline-none focus:ring-blue-300  ">
                        <strong>{{ tag.name }}</strong>
                    </div>
                </div>
        </div>
    </div>
</template>
