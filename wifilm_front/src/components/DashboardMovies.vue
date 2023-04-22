<template>
  <editmovie v-if="isformopen" :id="formid"></editmovie>
  <div class="mx-10 my-4 bg-white overflow-x-auto rounded-md py-5">
    <table class="min-w-full divide-y-2 divide-gray-200 text-sm">
      <thead>
        <tr>
          <th
            class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900"
          >
            Image
          </th>
          <th
            class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900"
          >
            Name
          </th>
          <th
            class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900"
          >
            Description
          </th>
          <th
            class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900"
          >
            genre
          </th>
          <th class="px-4 py-2"></th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        <tr v-for="movie in movies">
          <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            <div class="h-32 w-32 rounded-lg overflow-hidden shadow-md">
              <img
                :src="movie.image"
                alt="Image"
                class="w-full h-full object-cover"
              />
            </div>
          </td>
          <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            {{ movie.name }}
          </td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">
            {{ movie.description.substring(0, 40) }}...
          </td>
          <td
            class="whitespace-nowrap px-4 py-2 text-gray-700"
            v-if="movie.genres.length !== 0"
          >
            <div class="flex flex-col">
              <span
                v-for="genre in movie.genres"
                class="whitespace-nowrap rounded-full flex justify-center items-center m-2 bg-purple-100 px-2.5 py-0.5 text-sm text-purple-700"
              >
                {{ genre.name }}
              </span>
            </div>
          </td>
          <td
            class="whitespace-nowrap px-4 py-2 text-gray-700"
            v-if="movie.genres.length == 0"
          >
            No genre
          </td>
          <td class="whitespace-nowrap px-4 py-2">
            <a
              href="javascript:void(0)"
              @click="openform(movie.id)"
              class="inline-block mr-2 rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-4 h-4"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                />
              </svg>
            </a>
            <a
              href="javascript:void(0)"
              @click="destroy(movie.id)"
              class="inline-block ml-2 rounded bg-red-500 px-4 py-2 text-xs font-medium text-white hover:bg-red-400"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-4 h-4"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                />
              </svg>
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="flex justify-center py-10">
    <v-pagination
      v-model="page"
      :pages="pages"
      :range-size="1"
      active-color="rgb(250 204 21)"
      @update:modelValue="getmovies"
    />
  </div>
</template>
<script>
import editmovie from "../forms/editmovie.vue";
import VPagination from "@hennge/vue3-pagination";
import "@hennge/vue3-pagination/dist/vue3-pagination.css";
export default {
  data() {
    return {
      movies: {},
      formid: "",
      isformopen: false,
      getmoviestatus: false,
      page: 1,
      pages: 1,
    };
  },
  components: {
    editmovie,
    VPagination,
  },
  mounted() {
    this.getmovies();
  },
  methods: {
    getmovies() {
      this.getmoviestatus = true;
      axios
        .get("http://127.0.0.1:8000/api/DashboardMovies?page=" + this.page, {
          headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
          },
        })

        .then((response) => {
          this.getmoviestatus = false;
          this.movies = response.data.data;
          this.pages = response.data.last_page;
          this.isformopen = false;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    openform(id) {
      this.formid = id;
      this.isformopen = true;
    },
    destroy(id) {
      axios
        .delete("http://127.0.0.1:8000/api/movies/" + id, {
          headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
          },
        })
        .then((res) => {
          console.log(res);
          this.getmovies();
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
<style scoped></style>
