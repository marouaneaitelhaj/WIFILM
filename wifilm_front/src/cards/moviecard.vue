<template>
    <div class="m-3 flex justify-center items-center">
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full max-h-300" src="https://source.unsplash.com/random/1600x900" alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="font-bold text-white text-xl mb-2">{{ name }}</div>
                <p class="text-gray-200 text-base">
                    {{ description.substring(0, 100)}}...
                </p>
            </div>
            <div class="px-6 py-4" v-for="genre in genres">
                <span
                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#{{genre.name}}</span>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        name: String,
        description: String,
        image: String,
        genres: Array
    },
}
</script>