<template>
    <div>
        <h1>Movies</h1>
        <!-- <div class="flex justify-center w-full"> -->
            <div class="flex flex-wrap justify-center">
                <div v-for="movie in movies">
                    <MovieCard :id="movie.id" :name="movie.name" :genres="movie.genres"
                        :description="movie.description" :image="movie.image" :reviews="movie.reviews" />
                </div>
            </div>
        <!-- </div> -->
    </div>
</template>
<script>
import MovieCard from '@/cards/movieCard.vue'
import { useAuthStore } from '@/stores/auth'
import { useFxStore } from '@/stores/fx'
import router from '../router'
export default {
    components: {
        MovieCard
    },
    data() {
        return {
            movies: []
        }
    },
    mounted() {
        useFxStore().loading = true;
        axios.get('http://127.0.0.1:8000/api/movies', {
            headers: {
                Authorization: `Bearer ${useAuthStore().token}`
            }
        })
            .then(response => {
                this.movies = response.data;
            })
            .catch(error => {
                console.log(error);
            })
            .finally(() => {
                useFxStore().loading = false;
            })
    }

}
</script>