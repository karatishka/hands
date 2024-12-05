<script setup>
import NavComponent from "@/Components/NavComponent.vue";
</script>

<template>
    <NavComponent/>
    <main class="container mx-auto">
        <slot/>
    </main>
    <footer class="bg-white m-4">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024.  Made with ❤️ </span>
        </div>
    </footer>
</template>

<style scoped>

</style>
