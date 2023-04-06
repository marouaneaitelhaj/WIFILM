<template>
    <RouterLink :to="{ name: 'movie', params: { id: id } }">
        <div class="m-3 flex justify-center items-center">
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="object-cover h-48 w-96" :src="image">
                <div class="px-6 py-4">
                    <div class="font-bold text-white text-xl mb-2">{{ name }}</div>
                    <p class="text-gray-200 text-base">
                        {{ description.substring(0, 100) }}...
                    </p>
                </div>
                <div class="px-6 py-4">
                    <span v-for="genre in genres"
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#
                        {{ genre.name.substring(0, 10) }}</span>
                </div>
            </div>
        </div>
    </RouterLink>
    <!-- <div class="m-3 flex justify-center items-center">
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="object-cover h-48 w-96" :src="image">
            <div class="px-6 py-4">
                <div class="font-bold text-white text-xl mb-2">{{ name }}</div>
                <p class="text-gray-200 text-base">
                    {{ description.substring(0, 100) }}...
                </p>
            </div>
            <div class="px-6 py-4">
                <span v-for="genre in genres"
                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#
                    {{ genre.name.substring(0, 10) }}</span>
            </div>
        </div>
    </div> -->
</template>
<script>
import { RouterLink } from 'vue-router';

export default {
    props: {
        id: Number,
        name: String,
        description: String,
        image: String,
        genres: Array
    },
    components: { RouterLink }
}
</script>