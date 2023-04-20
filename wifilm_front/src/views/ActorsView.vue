<template>
    <div>
        <div class="flex flex-wrap justify-around">
            <div v-for="actor in actors">
                <actorcard :name="actor.name" :id="actor.id" :description="actor.description" :image="actor.image" />
            </div>
        </div>
        <pagination v-model="page" :records="500" :per-page="25" @paginate="myCallback"/>
    </div>
</template>
<script>
import actorcard from '../cards/actorcard.vue';
import { useAuthStore } from '@/stores/auth'
import { useFxStore } from '@/stores/fx'
import Pagination from 'v-pagination-3';

export default {
    components: {
        actorcard,
        Pagination
    },
    data() {
        return {
            actors: [],
            page: 1
        }
    },
    mounted() {
        useFxStore().loading = true;
        const authStore = useAuthStore();
        axios.get('http://127.0.0.1:8000/api/actors', {
            headers: {
                Authorization: `Bearer ${authStore.token}`
            }
        })

            .then(response => {
                this.actors = response.data.data;
            })
            .catch(error => {
                console.log(error);
            })
            .finally(() => {
                useFxStore().loading = false;
            })
    }
}
</script>