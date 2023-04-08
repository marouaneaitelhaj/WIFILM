<template>
    <div class="h-full">
        <ul class="flex border-b border-gray-100 h-full">
            <li class="flex-1">
                <a href="javascript:void(0)" @click="opencrud('movies')" class="relative block p-4" to="admin/Movies">
                    <span class="absolute inset-x-0 -bottom-px h-1 w-full transition-all duration-500"
                        :class="{ 'bg-yellow-400': component == 'movies' }"></span>

                    <div class="flex items-center justify-center gap-4">
                        <span class="text-sm font-medium text-white"> Movies </span>
                    </div>
                </a>
            </li>

            <li class="flex-1">
                <a href="javascript:void(0)" @click="opencrud('genres')" class="relative block p-4" to="admin/Movies">
                    <span class="absolute inset-x-0 -bottom-px h-1 w-full transition-all duration-500"
                        :class="{ 'bg-yellow-400': component == 'genres' }"></span>

                    <div class="flex items-center justify-center gap-4">


                        <span class="text-sm font-medium text-white"> Genres </span>
                    </div>
                </a>
            </li>

            <li class="flex-1">
                <a href="javascript:void(0)" @click="opencrud('actors')" class="relative block p-4" to="">
                    <span class="absolute inset-x-0 -bottom-px h-1 w-full transition-all duration-500"
                        :class="{ 'bg-yellow-400': component == 'actors' }"></span>

                    <div class="flex items-center justify-center gap-4">


                        <span class="text-sm font-medium text-white"> actors </span>
                    </div>
                </a>
            </li>

            <li class="flex-1">
                <a href="javascript:void(0)" @click="opencrud('add')" class="relative block p-4" :to="{ name: 'home' }">
                    <span class="absolute inset-x-0 -bottom-px h-1 w-full transition-all duration-500"
                        :class="{ 'bg-yellow-400': component == 'add' }">
                    </span>

                    <div class="flex items-center justify-center gap-4">


                        <span class="text-sm font-medium text-white"> Add </span>
                    </div>
                </a>
            </li>
        </ul>
        <adminMovies v-if="component == 'movies'" />
        <admingenres v-if="component == 'genres'" />
        <adminactors v-if="component == 'actors'" />
        <adminadd v-if="component == 'add'" />
        <div v-if="component == ''" class="flex justify-center py-64 font-bold text-3xl">
            <h1 class="text-white">Heloo Admin</h1>
        </div>
    </div>
</template>
<script>
import adminMovies from '../components/adminMovies.vue';
import admingenres from '../components/admingenres.vue';
import adminactors from '../components/adminactors.vue';
import adminadd from '../components/adminadd.vue';
import { RouterLink, RouterView } from 'vue-router'
export default {
    data() {
        return {
            component: ''
        }
    },
    components: {
        adminMovies,
        adminactors,
        admingenres,
        adminadd
    },
    methods: {
        opencrud(com) {
            console.log(com);
            this.component = com;
        }
    }
}
</script>
<style scoped></style>