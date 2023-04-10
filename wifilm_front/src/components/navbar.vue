<template>
    <header aria-label="Site Header" class="">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="">
                    <a class="block text-white" href="/">
                        <span class="sr-only">Home</span>
                        <h1 class="text-3xl  font-bold px-4 text-black rounded-md bg-yellow-400">WIFILM</h1>
                    </a>
                </div>

                <div class="md:flex md:items-center md:gap-12">
                    <nav aria-label="Site Nav" class="hidden md:block">
                        <ul class="flex items-center gap-6 text-sm">
                            <li>
                                <RouterLink class="text-white transition hover:text-yellow-400" :to="{ name: 'home' }">
                                    Home
                                </RouterLink>
                            </li>

                            <li>
                                <RouterLink class="text-white transition hover:text-yellow-400" :to="{ name: 'movies' }">
                                    Movies
                                </RouterLink>
                            </li>

                            <li>
                                <RouterLink class="text-white transition hover:text-yellow-400" :to="{ name: 'actors' }">
                                    Actors
                                </RouterLink>
                            </li>

                            <li>
                                <RouterLink class="text-white transition hover:text-yellow-400" :to="{ name: 'about' }">
                                    About
                                </RouterLink>
                            </li>
                        </ul>
                    </nav>

                    <div v-if="isAuth" class="flex items-center gap-4">

                        <div class="sm:flex sm:gap-4">
                            <a class="rounded-md bg-white px-5 py-2.5 text-sm font-medium text-black shadow"
                                href="javascript:void(0)" v-on:click="logout()">
                                Logout
                            </a>
                        </div>

                        <div class="block md:hidden">
                            <button @click="navbarbtn"
                                class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div v-else class="flex items-center gap-4">
                        <div class="sm:flex sm:gap-4">
                            <RouterLink class="rounded-md  border border-yellow-400 px-5 py-2.5 text-sm font-medium text-yellow-400 shadow"
                            :to="{ name: 'login' }">
                                Login
                            </RouterLink>

                            <div class="hidden sm:flex">
                                <RouterLink class="rounded-md bg-yellow-400 px-5 py-2.5 text-sm font-medium text-black"
                                :to="{ name: 'signup' }">
                                    Register
                                </RouterLink>
                            </div>
                        </div>

                        <div class="block md:hidden">
                            <button @click="navbarbtn"
                                class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>


                </div>

            </div>
            <nav aria-label="Site Nav" id="SiteNav" class=" w-full  z-30  h-48 hidden md:hidden">
                <ul class="animate-ul flex  flex-col justify-between  items-center h-full w-full text-sm">
                    <li>
                        <RouterLink class="text-white transition hover:text-yellow-400" :to="{ name: 'home' }">
                            Home
                        </RouterLink>
                    </li>

                    <li>
                        <RouterLink class="text-white transition hover:text-yellow-400" :to="{ name: 'movies' }">
                            Movies
                        </RouterLink>
                    </li>

                    <li>
                        <RouterLink class="text-white transition hover:text-yellow-400" :to="{ name: 'actors' }">
                            Actors
                        </RouterLink>
                    </li>

                    <li>
                        <RouterLink class="text-white transition hover:text-yellow-400" :to="{ name: 'about' }">
                            About
                        </RouterLink>
                    </li>
                    <li class="block sm:hidden">
                        <RouterLink class="text-white mb-8 transition hover:text-yellow-400" :to="{ name: 'home' }">
                            Register
                        </RouterLink>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</template>
<script>
import { mapWritableState } from 'pinia'
import { RouterLink, RouterView } from 'vue-router'
import { useAuthStore } from '@/stores/auth'
export default {
    data() {
        return {
            user: useAuthStore().user
        }
    },
    mounted() {
        if (localStorage.getItem('token')) {
            useAuthStore().loding = true
            useAuthStore().getUser()
        }
    },
    computed: {
        isAuth() {
            const authStore = useAuthStore()
            if (authStore.token !== null) {
                return true;
            } else {
                return false;
            }
        },
    },
    methods: {
        logout() {
            const authStore = useAuthStore()
            authStore.logout()
        },
        navbarbtn() {
            const navbar = document.getElementById('SiteNav')
            navbar.classList.toggle('hidden')
        }
    },
}
</script>
<style></style>
