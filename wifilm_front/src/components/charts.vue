<template>
    <div class="bg-white p-8">
        <div class="flex  items-center mb-3">
            <p class="ml-2 text-sm font-medium text-gray-900">{{ average }} out of 5</p>
        </div>
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ numberofrating }} global ratings</p>
        <div class="flex items-center mt-4">
            <span class="text-sm font-medium text-blue-600 dark:text-blue-500">5 star</span>
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-400 rounded" style="transition: width 0.5s ease;" :style="{ width: fivestar + '%' }"></div>
            </div>
            <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ fivestar }}%</span>
        </div>
        <div class="flex items-center mt-4">
            <span class="text-sm font-medium text-blue-600 dark:text-blue-500">4 star</span>
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-400 rounded" style="transition: width 0.5s ease;" :style="{ width: fourstar + '%' }"></div>
            </div>
            <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ fourstar }}%</span>
        </div>
        <div class="flex items-center mt-4">
            <span class="text-sm font-medium text-blue-600 dark:text-blue-500">3 star</span>
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-400 rounded" style="transition: width 0.5s ease;" :style="{ width: threestar + '%' }"></div>
            </div>
            <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ threestar }}%</span>
        </div>
        <div class="flex items-center mt-4">
            <span class="text-sm font-medium text-blue-600 dark:text-blue-500">2 star</span>
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-400 rounded" style="transition: width 0.5s ease;" :style="{ width: twostar + '%' }"></div>
            </div>
            <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ twostar }}%</span>
        </div>
        <div class="flex items-center mt-4">
            <span class="text-sm font-medium text-blue-600 dark:text-blue-500">1 star</span>
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-400 rounded" style="transition: width 0.5s ease;" :style="{ width: onestar + '%' }"></div>
            </div>
            <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ onestar }}%</span>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        onestar: 0,
        twostar: 0,
        threestar: 0,
        fourstar: 0,
        fivestar: 0,
        numberofrating: 0,
        average: 0,
    }
}
</script>
<style scoped></style>