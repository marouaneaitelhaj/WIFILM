<template>
    <search v-if="divVisible" />
    <div class="overflow-x-auto mx-5">
        <div class="flex w-max my-5">
            <p :class="
                [
                    'mx-2',
                    'px-5',
                    'py-2',
                    'border',
                    'rounded-full',
                    { 'text-yellow-400': SelectedGenre === '0' },
                    { 'text-white': SelectedGenre !== '0' },
                ]
            " @click="getMovies(page = 1, genre = '0')">All</p>
            <p v-for="genre in genres" @click="getMovies(page = 1, genre = genre.id)" :class="
                [
                    'mx-2',
                    'px-5',
                    'py-2',
                    'border',
                    'rounded-full',
                    { 'text-yellow-400': SelectedGenre === genre.id },
                    { 'text-white': SelectedGenre !== genre.id },
                ]
            ">{{ genre.name }}</p>
        </div>
    </div>
    <div class="h-screen">
        <div class="flex flex-wrap justify-center">
            <div v-for="(movie, i) in movies">
                <MovieCard :id="movie.id" :rank="((page - 1) * 8) + i + 1" :name="movie.name" :genres="movie.genres"
                    :description="movie.description" :image="movie.image" :reviews="movie.reviews" />
            </div>
        </div>
        <pagination class="py-10" :all="all" />
    </div>
</template>
<script>
import MovieCard from '@/cards/movieCard.vue'
import { useAuthStore } from '@/stores/auth'
import pagination from '@/components/pagination.vue'
import { useFxStore } from '@/stores/fx'
import search from '@/components/search.vue'
export default {
    components: {
        MovieCard,
        pagination,
        search
    },
    data() {
        return {
            movies: {},
            genres: {},
            all: 0,
            divVisible: false,
            page: 1,
            SelectedGenre: 0
        }
    },
    mounted() {
        this.getMovies();
        this.getGenres();
        window.addEventListener('keydown', this.handleKeyDown)
    },
    methods: {
        handleKeyDown(event) {
            if (event.ctrlKey && event.key === 'q') {
                this.divVisible = !this.divVisible
            }
        },
        getMovies(page = 1, genre = 0) {
            this.SelectedGenre = genre;
            useFxStore().loading = true;
            axios.get('http://127.0.0.1:8000/api/movies?page=' + page + '&genre=' + genre, {
                headers: {
                    Authorization: `Bearer ${useAuthStore().token}`
                }
            })
                .then(response => {
                    this.movies = response.data.movies;
                    this.all = response.data.all;
                    this.page = response.data.page;
                })
                .catch(error => {
                    console.log(error);
                })
                .finally(() => {
                    useFxStore().loading = false;
                })
        },
        getGenres() {
            axios.get("http://127.0.0.1:8000/api/genres", {
                headers: {
                    Authorization: `Bearer ${useAuthStore().token}`
                }
            })
                .then(response => {
                    this.genres = response.data;
                })
        }
    },

}
</script>
<style scoped>
::-webkit-scrollbar {
    display: none;
}
</style>