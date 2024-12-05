<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";

defineProps({
    article: Object
});

function send(){

}
</script>

<template>
    <MainLayout>
        <h3 style="color: red">Уже не было сил и варемени верстать =( </h3>
        <div class="flex flex-col items-center">
            <div class="grid grid-cols-1 gap-1">
                <p><b>id:</b> {{ article.id }}</p>
                <p><b>title:</b>title: {{ article.title }}</p>
                <p><b>description:</b>description: {{ article.description }}</p>
                <div>
                    <p><b>tags:</b> tags: </p>
                    <p v-for="tag in article.tags"> {{ tag.name }}</p>
                </div>
            </div>
        </div>

        <hr>
        <h2 class="max-w-sm mx-auto font-bold">Оставить комментарий  </h2>

        <form class="max-w-sm mx-auto" method="post">
            <div class="mb-5">
                <label for="theme" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">  тема </label>
                <input type="text" id="theme"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required/>
            </div>

            <div class="flex items-start mb-5">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">  message</label>
                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
            </div>
            <button @click.prevent="send"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>

    </MainLayout>
</template>
