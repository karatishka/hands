<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import {onMounted, ref} from "vue";
import {usePage} from "@inertiajs/vue3";
import axios from "axios";


const props = defineProps({
    article: Object
});

const success = ref(false);
const subject = ref();
const body = ref();
const viewCount = ref(0);
const likeCount = ref(0);

onMounted(() => {
    fetchViewCount();
    fetchLikeCount();
    setTimeout(() => {
        incrementView();
    }, 5000);
});

function incrementView() {
    axios.post(route('view', id))
        .then(res => {
            viewCount.value = res.data
        })
        .catch(err => console.log(err.data))
}

function incrementLike() {
    axios.post(route('like', id))
        .then(res => {
            likeCount.value = res.data
        })
        .catch(err => console.log(err.data))
}

function fetchViewCount (){
    axios.get(route('getView', id))
        .then(res => {
           viewCount.value = res.data
        })
        .catch(err => console.log(err.data))
}

function fetchLikeCount (){
    axios.get(route('getLike', id))
        .then(res => {
            likeCount.value = res.data
        })
        .catch(err => console.log(err.data))
}

const PageId = () => {
    const parsePageId = (path) => path.substring(path.lastIndexOf('/') + 1)
    const pageId = parsePageId(usePage().url)

    const splitPathname = pageId.split("/")
    const itemId = splitPathname[splitPathname.length - 1]

    return (
        itemId
    )
}

const id = PageId();

function send() {
    const data = {
        "subject": subject.value,
        "body": body.value,
        "article_id": id,
    }

    axios.post(route('comment'), data)
        .then(res => {
            success.value = true
        })
        .catch(err => console.log(err.data))
}
</script>

<template>
    <MainLayout>
        <h3 style="color: red">Уже не было сил и времени верстать =( </h3>
        <div class="flex flex-col items-center">
            <div class="flex flex-col items-center pb-10">
                <div class="flex mt-4 md:mt-6">
                    <div
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center focus:ring-4 focus:outline-none focus:ring-blue-300">
                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="M16 0H4a2 2 0 0 0-2 2v1H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4.5a3 3 0 1 1 0 6 3 3 0 0 1 0-6ZM13.929 17H7.071a.5.5 0 0 1-.5-.5 3.935 3.935 0 1 1 7.858 0 .5.5 0 0 1-.5.5Z"></path>
                        </svg>
                        <strong  >Кол-во просмотрров {{ viewCount }}</strong>

                    </div>

                    <div
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center focus:ring-4 focus:outline-none focus:ring-blue-300">
                        <strong  >like {{ likeCount }}</strong> <a @click.prevent="incrementLike"
                        href="#">❤️</a>
                    </div>


                </div>
            </div>
            <div class="grid grid-cols-1 gap-1">
                <p><b>id:</b> {{ props.article.id }}</p>
                <p><b>title:</b>title: {{ props.article.title }}</p>
                <p><b>description:</b> {{ props.article.description }}</p>
                <div>
                    <p><b>tags:</b></p>
                    <p v-for="tag in props.article.tags"> {{ tag.name }}</p>
                </div>
            </div>
        </div>

        <hr>


        <div v-if="success">
            <p style="color: darkgreen">Успешно отправлено</p>
        </div>
        <form class="max-w-sm mx-auto" method="post" v-else>
            <h2 class="max-w-sm mx-auto font-bold">Оставить комментарий </h2>
            <div class="mb-5">
                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> тема </label>
                <input v-model="subject" type="text" id="subject"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       required/>
            </div>

            <div class="flex items-start mb-5">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    message</label>
                <textarea v-model="body" id="message" rows="4"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Leave a comment..."></textarea>
            </div>
            <button @click.prevent="send"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </form>

    </MainLayout>
</template>
