<template>
    <RouterLink to="sss">
        <div class=" bg-zinc-900 flex flex-col m-10 p-10 rounded-md justify-center items-center">
            <div>
                <img class="h-48 w-48 object-cover  rounded-full" :src="image" alt="Sunset in the mountains">
            </div>
            <div class="flex py-5 justify-center">
                <p class="font-bold text-white text-xl">{{ name }}</p>
            </div>
        </div>
    </RouterLink>
</template>
<script>
import { RouterLink } from 'vue-router';
export default {
    props: {
        name: String,
        description: String,
        image: String,
    },
    components: {
        RouterLink,
    },
}
</script>