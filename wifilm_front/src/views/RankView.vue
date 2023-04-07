<template>
    <ul class="w-full px-20 py-14 divide-y divide-gray-200 dark:divide-gray-700">
        <li class="pb-3 sm:pb-4">
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <img class="w-8 h-8 rounded-full"  alt="Neil image">
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                        Neil Sims
                    </p>
                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                        email@flowbite.com
                    </p>
                </div>
                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                    $320
                </div>
            </div>
        </li>
    </ul>
</template>
<script>
export default {
    data() {
        return {
            movies: []
        }
    },
    mounted() {
        axios.get('http://127.0.0.1:8000/api/bestmovies', {
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            }
        })
            .then(res => {
                this.movies = res.data
            })
    }
}
</script>