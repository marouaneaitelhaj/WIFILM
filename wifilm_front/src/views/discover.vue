<template>
  <div class=" flex justify-center flex-wrap">
    <div
      v-for="genre in genres.data"
      class="h-64 w-1/2 relative  flex justify-center"
    >
      <img
        :src="genre.movie_image"
        class="max-h-full w-full object-cover brightness-25"
        alt=""
      />
      <div class="flex justify-center bottom-0 pb-10 absolute flex-col">
        <p class="text-white text-lg font-semibold">{{ genre.name }}</p>
      </div>
    </div>
  </div>
</template>
<script>
import VPagination from "@hennge/vue3-pagination";
import "@hennge/vue3-pagination/dist/vue3-pagination.css";
import { useAuthStore } from "@/stores/auth";
export default {
  data() {
    return {
      genres: [],
      page: 1,
      pages: 1,
      description: false,
    };
  },
  components: {
    VPagination,
  },
  mounted() {
    this.getGenres();
  },
  methods: {
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
