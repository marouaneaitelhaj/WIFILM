<template>
    <RouterLink :to="{ name: 'movie', params: { id: id } }">
        <div class="m-3 bg-zinc-900 flex relative justify-center items-center rounded-tr-lg">
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <div class="w-full flex justify-end absolute ">
                    <span class=" mr-2 mt-2 font-bold p-4 rounded-full bg-yellow-400 text-black ">#{{ rank }}</span>
                </div>
                <div>
                    <img class="object-cover w-52  h-80 hover:brightness-75" :src="image">
                </div>
                <div class="px-5 py-3">
                    <div class="flex">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <span class="text-white">
                            {{ averageRate }}
                        </span>
                    </div>
                    <div class=" text-white text-lg mb-2 w-40">
                        <p class="truncate">{{ name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </RouterLink>
</template>
<script>
import { RouterLink } from 'vue-router';

export default {
    data() {
        return {
            averageRate: 0
        }
    },
    props: {
        id: Number,
        name: String,
        description: String,
        image: String,
        genres: Array,
        reviews: Array,
        rank: Number
    },
    mounted() {
        var sum = 0;
        for (let i = 0; i < this.reviews.length; i++) {
            sum += this.reviews[i].review;
        }
        this.averageRate = sum / this.reviews.length;
        if (isNaN(this.averageRate)) {
            this.averageRate = 0;
        }
    },
    cpomponents: {
        RouterLink
    }
}
</script>