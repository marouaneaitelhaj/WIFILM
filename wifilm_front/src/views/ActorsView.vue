<template>
  <div>
    <div class="flex flex-wrap justify-around">
      <div v-for="actor in actors">
        <actorcard
          :name="actor.name"
          :id="actor.id"
          :description="actor.description"
          :image="actor.image"
        />
      </div>
    </div>
  </div>
  <div class="flex justify-center py-10">
    <v-pagination
    v-model="page"
    :pages="pages"
    :range-size="1"
    active-color="rgb(250 204 21)"
    @update:modelValue="getActors"
  />
  </div>
  <ftr />
</template>
<script>
import actorcard from "../cards/actorcard.vue";
import { useAuthStore } from "@/stores/auth";
import { useFxStore } from "@/stores/fx";
import VPagination from "@hennge/vue3-pagination";
import "@hennge/vue3-pagination/dist/vue3-pagination.css";
import ftr from '@/components/footer.vue'

export default {
  components: {
    actorcard,
    VPagination,
    ftr,
  },
  data() {
    return {
      actors: [],
      page: 1,
      pages: 1,
    };
  },
  mounted() {
    this.getActors();
  },
  methods: {
    getActors() {
      useFxStore().loading = true;
      const authStore = useAuthStore();
      axios
        .get("http://127.0.0.1:8000/api/actors?page=" + this.page, {
          headers: {
            Authorization: `Bearer ${authStore.token}`,
          },
        })
        .then((response) => {
          this.actors = response.data.data;
          this.pages = response.data.last_page;
        })
        .catch((error) => {
          console.log(error);
        })
        .finally(() => {
          useFxStore().loading = false;
        });
    },
  },
  watch: {
    page: function () {
      console.log(this.page);
    },
  },
};
</script>
