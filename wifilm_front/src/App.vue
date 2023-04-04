<script>
import { RouterLink, RouterView } from 'vue-router'
import navbar from '@/components/navbar.vue'
import loading from '@/components/loading.vue'
import { useFxStore } from '@/stores/fx'
import { useAuthStore } from '@/stores/auth'
import { mapWritableState } from 'pinia'
import ftr from './components/footer.vue'

export default {

  data() {
    return {
      loading: useFxStore().loading || false,
    }
  },
  mounted() {
      
    useAuthStore().getUser()
  },
  components: {
    navbar,
    loading,
    ftr
  },
  computed: {
    ...mapWritableState(useFxStore, {
      myownloading: 'loading',
    }),
  },
  watch: {
    myownloading() {
      this.loading = useFxStore().loading;
    },
  },

}

</script>

<template>
  <loading v-if="loading" />
  <navbar />
  <RouterView />
  <ftr />
</template>

<style scoped></style>
