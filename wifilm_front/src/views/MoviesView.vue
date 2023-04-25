<template>
  <search v-if="divVisible" />

  <div class="overflow-x-auto mx-5">
    <div class="flex w-max my-5">
      <p
        :class="[
          'mx-2',
          'px-5',
          'cursor-pointer',
          'py-2',
          'border',
          'rounded-full',
          { 'text-yellow-400': SelectedGenre === '0' },
          { 'text-white': SelectedGenre !== '0' },
        ]"
        @click="getMovies((page = 1), (genre = '0'))"
      >
        All
      </p>
      <p
        v-for="genre in genres"
        @click="getMovies((page = 1), (genre = genre.id))"
        :class="[
          'mx-2',
          'px-5',
          'py-2',
          'cursor-pointer',
          'border',
          'rounded-full',
          { 'text-yellow-400': SelectedGenre === genre.id },
          { 'text-white': SelectedGenre !== genre.id },
        ]"
      >
        {{ genre.name }}
      </p>
    </div>
  </div>
  <div @click="opensearsh" class="flex justify-end mr-10">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      fill="none"
      viewBox="0 0 24 24"
      stroke-width="1.5"
      stroke="currentColor"
      class="w-6 h-6 text-white cursor-pointer"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
      />
    </svg>
  </div>
  <div class="min-h-screen">
    <div class="flex flex-wrap justify-center">
      <div v-for="(movie, i) in movies" :key="movie">
        <MovieCard
          :id="movie.id"
          :rank="(page - 1) * 8 + i + 1"
          :name="movie.name"
          :genres="movie.genres"
          :description="movie.description"
          :image="movie.image"
          :reviews="movie.reviews"
        />
      </div>
      <div class="flex justify-center"></div>
    </div>
    <div class="flex justify-center py-10">
    <v-pagination
      v-model="page"
      :pages="pages"
      :range-size="1"
      active-color="rgb(250 204 21)"
      @update:modelValue="getMovies"
    />
</div>
  </div>
  <ftr />
</template>
<script>
import ftr from '@/components/footer.vue'

import MovieCard from "@/cards/movieCard.vue";
import { useAuthStore } from "@/stores/auth";
import pagination from "@/components/pagination.vue";
import { useFxStore } from "@/stores/fx";
import search from "@/components/search.vue";
import VPagination from "@hennge/vue3-pagination";
import "@hennge/vue3-pagination/dist/vue3-pagination.css";
export default {
  components: {
    MovieCard,
    VPagination,
    search,
    ftr,
  },
  props: {
    genre: Number,
  },
  data() {
    return {
      movies: {},
      genres: {},
      all: 0,
      divVisible: false,
      page: 1,
      pages: 1,
      SelectedGenre: 0,
    };
  },
  mounted() {
    this.getMovies();
    this.getGenres();
    window.addEventListener("keydown", this.handleKeyDown);
  },
  methods: {
    opensearsh() {
      this.divVisible = !this.divVisible;
    },
    handleKeyDown(event) {
      if (event.ctrlKey && event.key === "q") {
        this.divVisible = !this.divVisible;
      }
    },
    getMovies(page = 1, genre = this.genre || 0) {
      this.SelectedGenre = genre;
      useFxStore().loading = true;
      axios
        .get(
          "http://127.0.0.1:8000/api/movies?page=" + page + "&genre=" + genre,
          {
            headers: {
              Authorization: `Bearer ${useAuthStore().token}`,
            },
          }
        )
        .then((response) => {
          this.movies = response.data.data;
          this.pages = response.data.last_page;
        })
        .catch((error) => {
          console.log(error);
        })
        .finally(() => {
          useFxStore().loading = false;
        });
    },
    getGenres() {
      axios
        .get("http://127.0.0.1:8000/api/genres", {
          headers: {
            Authorization: `Bearer ${useAuthStore().token}`,
          },
        })
        .then((response) => {
          this.genres = response.data;
        });
    },
  },
};
</script>
<style scoped>
::-webkit-scrollbar {
  display: none;
}
</style>
