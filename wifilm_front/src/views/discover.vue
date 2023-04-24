<template>
  <div class=" flex justify-center flex-wrap">
    <RouterLink @mouseover="hover(genre.id)" @mouseleave="hover(0)" v-for="genre in genres.data" class="h-64 m-3 w-1/2 relative  flex justify-center flex-wrap"
      :to="{ name: 'movies', params: { genre: genre.id } }">
      <img :src="genre.movie_image"
        class="max-h-full w-full object-cover brightness-100 hover:brightness-25 transition duration-500 ease-in-out"
        alt="" />
      <div class="flex justify-center bottom-0 top-0 absolute flex-col">
        <p v-if="description !== genre.id" class=" text-white text-lg font-semibold">{{ genre.name }}</p>
          <p v-if="description == genre.id" class="text-white text-lg font-light">{{ genre.description }}</p>
      </div>
    </RouterLink>
  </div>
</template>
<script>
import { RouterLink, RouterView } from "vue-router";
import VPagination from "@hennge/vue3-pagination";
import "@hennge/vue3-pagination/dist/vue3-pagination.css";
import { useAuthStore } from "@/stores/auth";
export default {
  data() {
    return {
      genres: [],
      page: 1,
      pages: 1,
      description: 0,
    };
  },
  components: {
    VPagination,
  },
  mounted() {
    this.getGenres();
  },
  methods: {
    hover(e){
      this.description = e
    },
    getGenres() {
      axios
        .get("http://127.0.0.1:8000/api/DashboardGenres", {
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
