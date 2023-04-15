<template>
    <div class="h-screen w-screen fixed z-40 shadow-md">
        <div class="bg-zinc-900 flex flex-col items-center py-20 mx-20 rounded-md max-sm:py-10 max-sm:mx-5">
            <div @click="close" class="flex w-full justify-end mr-5">
                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-white cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <div class="w-full px-10 border-none ">
                <input type="text" class="w-full text-white py-2 px-2 border-b-2 bg-transparent focus:outline-none"
                    v-model="Search" placeholder="Search" />
            </div>
            <div class="flex flex-col px-10 justify-start w-full">
                <RouterLink v-for="suggestion in suggestions" :to="{ name: 'movie', params: { id: suggestion.id } }">
                    <div class="flex py-5 justify-start items-center border-b-2 hover:bg-zinc-800 max-sm:justify-center">
                        <img :src="suggestion.image" class="w-20 h-20  object-cover" alt="">
                        <p class="pl-10 text-white max-sm:hidden">
                            {{ suggestion.name }}
                        </p>
                    </div>
                </RouterLink>
            </div>
        </div>
    </div>
</template>
<script>
import { watch } from 'vue';

export default {
    data() {
        return {
            Search: '',
            suggestions: []
        }
    },
    methods: {
        close(){
            this.$parent.divVisible = false;
        },
        getMovies() {
            axios.get("http://127.0.0.1:8000/api/searshformovies/" + this.Search)
                .then(response => {
                    this.suggestions = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },
    watch: {
        Search() {
            if (this.Search == '') {
                this.suggestions = [];
            } else {
                this.getMovies();
            }
        }
    }
}
</script>