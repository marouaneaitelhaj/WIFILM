<template>
    <editgenre v-if="isformopen" :id="formid"></editgenre>
  <div class="bg-white overflow-x-auto">
    <p class="text-white">admingenres</p>
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
          <th class="px-4 py-2"></th>
        </tr>
      </thead>

      <tbody class="divide-y h-screen divide-gray-200">
        <tr v-for="genre in genres">
          <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            <div class="h-32 w-32 rounded-lg overflow-hidden shadow-md">
              <img :src="genre.image" alt="Image" class="w-full h-full object-cover">
            </div>
          </td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ genre.name }}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ genre.description.substring(0, 40) }}...</td>
          <td class="whitespace-nowrap px-4 py-2">
            <a href="#" @click="openform(genre.id)"
              class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
              Edit
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
import editgenre from '../forms/editgenre.vue';
export default {
  data() {
    return {
      genres: [],
      isformopen: false,
      getgenrestatus: false
    }
  },
  components: {
    editgenre
  },
  mounted() {
    this.getgenres();
  },
  methods: {
    openform(id) {
      this.formid = id;
      this.isformopen = true;
    },
    getgenres() {
      this.getmoviestatus = true;
      axios.get('http://127.0.0.1:8000/api/genres', {
        headers: {
          'Authorization': 'Bearer ' + localStorage.getItem('token')
        }
      })

        .then(response => {
          this.getmoviestatus = false;
          this.genres = response.data;
          this.isformopen = false;
        })
        .catch(error => {


          console.log(error);
        })
    },
  }
}
</script>
<style scoped></style>