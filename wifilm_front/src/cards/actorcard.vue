<template>
    <div class="m-3 flex justify-center items-center">
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" :src="image" alt="Sunset in the mountains">
                <div class="px-6 py-4">
                    <div class="font-bold text-white text-xl mb-2">{{ name }}</div>
                    <p class="text-gray-200 text-base">
                        {{ description.substring(0, 100) }}...
                    </p>
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
    },
}
</script>