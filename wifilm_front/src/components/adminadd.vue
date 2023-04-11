<template>
    <div style="z-index: -1;"
        class="fixed top-0 left-0 right-0 bottom-0 w-full h-screen z-50 overflow-hidden   flex flex-col items-center justify-center">
        <div class="rounded p-8 bg-white w-3/6 space-y-4">
            <div @click="opencrud('movie')">
                <label for="DeliveryPriority"
                    class="flex  cursor-pointer items-center justify-center rounded-lg border border-gray-100 p-4 text-sm font-medium shadow-sm hover:border-gray-200 peer-checked:border-blue-500 peer-checked:ring-1 peer-checked:ring-blue-500">
                    <p class="text-gray-700">Add movies</p>

                </label>
            </div>
            <div @click="opencrud('genre')">

                <label for="DeliveryPriority"
                    class="flex cursor-pointer items-center justify-center rounded-lg border border-gray-100 p-4 text-sm font-medium shadow-sm hover:border-gray-200 peer-checked:border-blue-500 peer-checked:ring-1 peer-checked:ring-blue-500">
                    <p class="text-gray-700">Add Genres</p>

                </label>
            </div>
            <div @click="opencrud('actor')">

                <label for="DeliveryPriority"
                    class="flex cursor-pointer items-center justify-center rounded-lg border border-gray-100 p-4 text-sm font-medium shadow-sm hover:border-gray-200 peer-checked:border-blue-500 peer-checked:ring-1 peer-checked:ring-blue-500">
                    <p class="text-gray-700">Add Actors</p>

                </label>
            </div>
        </div>
    </div>
    <AddMovie v-if="openedform == 'movie'"></AddMovie>
    <AddGenre v-if="openedform == 'genre'"></AddGenre>
    <AddActor v-if="openedform == 'actor'"></AddActor>
</template>
<script>
import AddMovie from './AddMovie.vue';
import AddGenre from './AddGenre.vue';
import AddActor from './AddActor.vue';
export default {
    data() {
        return {
            openedform: '',
        }
    },
    methods: {
        opencrud(name) {
            this.openedform = name
        }
    },
    components: {
        AddMovie,
        AddGenre,
        AddActor,
    }
}
</script>
<style scoped></style>