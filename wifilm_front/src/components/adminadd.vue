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
        </div>
    </div>
    <addmovie v-if="openedform == 'movie'"></addmovie>
    <addgenre v-if="openedform == 'genre'"></addgenre>
</template>
<script>
import addmovie from './addmovie.vue';
import addgenre from './addgenre.vue';
export default {
    data() {
        return {
            openedform: '',
        }
    },
    methods: {
        opencrud(name) {
            console
            this.openedform = name
        }
    },
    components: {
        addmovie,
        addgenre
    }
}
</script>
<style scoped></style>