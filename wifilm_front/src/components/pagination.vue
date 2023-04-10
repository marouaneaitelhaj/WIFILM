<template>
    <ol class="flex justify-center gap-1 text-xs font-medium">
        <li v-for="(page, i) in all" @click="getMovies(i + 1)">
            <a href="#" class="block text-white h-8 w-8 rounded border border-gray-100 text-center leading-8">
                {{ i + 1 }}
            </a>
        </li>
    </ol>
</template>
<script>
export default {
    props: {
        all: {
            type: Number,
            required: true
        },
    },
    methods: {
        getMovies(i) {
            this.$parent.getMovies(i);
        }
    }
}
</script>