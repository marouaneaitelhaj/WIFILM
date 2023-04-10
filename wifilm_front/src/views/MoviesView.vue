<template>
    <search v-if="divVisible" />
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
            all: 0,
            divVisible: false,
            page: 1
        }
    },
    mounted() {
        this.getMovies();
        window.addEventListener('keydown', this.handleKeyDown)
    },
    methods: {
        handleKeyDown(event) {
            if (event.ctrlKey && event.key === 'q') {
                this.divVisible = !this.divVisible
            }
        },
        getMovies(page = 1) {
            useFxStore().loading = true;
            axios.get('http://127.0.0.1:8000/api/movies?page=' + page, {
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
        }
    },

}
</script>