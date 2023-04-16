<template>
    <div class="flex px-10 flex-wrap py-10 max-sm:block">
        <div class=" bg-yellow-400 h-screen w-1/3 rounded-md max-sm:w-full">
            <div class=" flex items-center py-14 flex-col ">
                <img :src="actor.image" class="h-40 w-40 object-cover rounded-full" alt="">
                <h1 class="font-bold text-xl">{{ actor.name }}</h1>
            </div>
            <div class="flex justify-center flex-col px-5">
                <p>{{ actor.description }}</p>
            </div>
        </div>
        <div class="bg-zinc-900 w-2/3 flex flex-wrap justify-center max-sm:w-full max-sm:mt-5">
                <moviecard v-for="movie in actor.movies" :key="movie.id" :name="movie.name" :image="movie.image"
                    :id="movie.id"></moviecard>
        </div>
    </div>
</template>
<script>
import moviecard from '../cards/moviecard.vue'
export default {
    data() {
        return {
            actor: {}
        }
    },
    components: {
        moviecard
    },
    props: {
        id: {
            type: String,
            required: true
        }
    },
    mounted() {
        this.GetActor()
    },
    methods: {
        GetActor() {
            axios.get('http://127.0.0.1:8000/api/actors/' + this.id,
                {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                    }
                }
            )
                .then(res => {
                    this.actor = res.data
                })
        }
    }
}
</script>