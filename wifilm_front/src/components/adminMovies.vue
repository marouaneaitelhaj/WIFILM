<template>
  <editmovie v-if="isformopen" :id="formid"></editmovie>
  <div class="mx-10 my-4 bg-white overflow-x-auto">
    <table class="min-w-full divide-y-2 divide-gray-200 text-sm">
      <thead>
        <tr>
          <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
            Image
          </th>
          <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
            Name
          </th>
          <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
            Description
          </th>
          <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
            genre
          </th>
          <th class="px-4 py-2"></th>
        </tr>
      </thead>
      <tbody class="divide-y h-screen divide-gray-200">
        <tr v-for="movie in movies">
          <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            <div class="h-32 w-32 rounded-lg overflow-hidden shadow-md">
              <img :src="movie.image" alt="Image" class="w-full h-full object-cover">
            </div>
          </td>
          <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            {{ movie.name }}
          </td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">
            {{ movie.description.substring(0, 40) }}...
          </td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700" v-if="movie.genres.length !== 0">
            <div class="flex flex-col">
              <span v-for="genre in movie.genres"
                class="whitespace-nowrap rounded-full flex justify-center items-center m-2 bg-purple-100 px-2.5 py-0.5 text-sm text-purple-700">
                {{ genre.name }}
              </span>
            </div>
          </td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700" v-if="movie.genres.length == 0">
            No genre
          </td>
          <td class="whitespace-nowrap px-4 py-2">
            <a href="javascript:void(0)" @click="openform(movie.id)"
              class="inline-block mr-2 rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
              Edit
            </a>
            <a href="javascript:void(0)" @click="destroy(movie.id)"
              class="inline-block  ml-2 rounded bg-red-500 px-4 py-2 text-xs font-medium text-white hover:bg-red-400">
              Delete
            </a>

          </td>
        </tr>

      </tbody>
    </table>
  </div>
</template>
<script>
import editmovie from '../forms/editmovie.vue';
export default {
  data() {
    return {
      movies: {},
      formid: '',
      isformopen: false,
      getmoviestatus: false
    }
  },
  components: {
    editmovie
  },
  mounted() {
    this.getmovies();

  },
  methods: {
    getmovies() {
      this.getmoviestatus = true;
      axios.get('http://127.0.0.1:8000/api/movies', {
        headers: {
          'Authorization': 'Bearer ' + localStorage.getItem('token')
        }
      })

        .then(response => {
          this.getmoviestatus = false;
          this.movies = response.data;
          this.isformopen = false;
        })
        .catch(error => {


          console.log(error);
        })
    },
    openform(id) {
      this.formid = id;
      this.isformopen = true;
    },
    destroy(id) {
      axios.delete("http://127.0.0.1:8000/api/movies/" + id, {
        headers: {
          'Authorization': 'Bearer ' + localStorage.getItem('token')
        }
      })
        .then(res => {
          console.log(res)
          this.getmovies();
        })
        .catch(err => {
          console.log(err)
        })
    }
  }
}
</script>
<style scoped></style>