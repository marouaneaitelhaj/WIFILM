<template>
    <div class="h-screen w-screen fixed z-40 shadow-md">
        <div class="bg-white flex flex-col items-center pt-10 pb-10 mx-20">
            <div>
                <input type="text" class="border border-gray-300 rounded w-96 h-10 " v-model="Search"
                    placeholder="Search" />
            </div>
            <div class="flex flex-col px-10 justify-start w-full ">
                <RouterLink v-for="suggestion in suggestions" :to="{ name: 'movie', params: { id: suggestion.id } }">
                    <div  class="flex py-5 justify-start items-center hover:bg-zinc-100">
                        <img :src="suggestion.image" class="w-20 h-20  object-cover" alt="">
                        <p class="pl-10">
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