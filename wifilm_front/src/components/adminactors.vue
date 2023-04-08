<template>
  <editactor v-if="isformopen" :id="formid"></editactor>
  <div class=" mx-10 my-4 bg-white overflow-x-auto">
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

      <tbody class="divide-y divide-gray-200">
        <tr v-for="actor in actors" class="max-w-2xl">
          <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
            <div class="h-32 w-32 rounded-lg overflow-hidden shadow-md">
              <img :src="actor.image" alt="Image" class="w-full h-full object-cover">
            </div>
          </td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ actor.name }}</td>
          <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ actor.description.substring(0, 40) }}...</td>
          <td class="whitespace-nowrap px-4 py-2">
            <a href="#" @click="openform(actor.id)"
              class="inline-block rounded mr-2 bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
              Edit
            </a>
            <a href="javascript:void(0)" @click="destroy(actor.id)"
              class="inline-block rounded ml-2 bg-red-500 px-4 py-2 text-xs font-medium text-white hover:bg-red-400">
              Delete
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
import editactor from '../forms/editactor.vue';
export default {
  data() {
    return {
      actors: [],
      isformopen: false,
    }
  },
  components: {
    editactor
  },
  mounted() {
    this.getActors()
  },
  methods: {
    openform(id) {
      this.formid = id;
      this.isformopen = true;
      getgenrestatus: false
    },
    destroy(id) {
      axios.delete("http://127.0.0.1:8000/api/actors/" + id, {
        headers: {
          'Authorization': 'Bearer ' + localStorage.getItem('token')
        }
      })
        .then(res => {
          console.log(res)
          this.getActors();
        })
        .catch(err => {
          console.log(err)
        })
    },
    getActors() {
      axios.get("http://127.0.0.1:8000/api/actors", {
        headers: {
          Authorization: `Bearer ${localStorage.getItem('token')}`
        }
      })
        .then(response => {
          this.actors = response.data
        })
        .catch(err => {
          console.log(err)
        })
    }
  }
}
</script>
<style scoped></style>