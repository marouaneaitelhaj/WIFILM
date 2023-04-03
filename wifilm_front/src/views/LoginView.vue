<template>
  <section class="relative flex flex-wrap lg:h-screen lg:items-center">
    <div class="w-full px-4 py-12 sm:px-6 sm:py-16 lg:w-1/2 lg:px-8 lg:py-24">
      <div class="mx-auto max-w-lg text-center">
        <h1 class="text-2xl font-bold sm:text-3xl">Get started today!</h1>

        <p class="mt-4 text-gray-500">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Et libero nulla
          eaque error neque ipsa culpa autem, at itaque nostrum!
        </p>
        
      </div>

      <form action="" class="mx-auto mt-8 mb-0 max-w-md space-y-4">
        <div>
          <label for="email" class="sr-only">Email</label>

          <div class="relative">
            <input v-model="email" type="email" class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm"
              placeholder="Enter email" />

            <span class="absolute inset-y-0 right-0 grid place-content-center px-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
              </svg>
            </span>
            <span class="mt-4 text-red-500" v-if="error">
              {{ error.email }}
            </span>
          </div>
        </div>

        <div>
          <label for="password" class="sr-only">Password</label>

          <div class="relative">
            <input v-model="password" type="password"
              class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm" placeholder="Enter password" />

            <span class="absolute inset-y-0 right-0 grid place-content-center px-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
            </span>
            <span class="mt-4 text-red-500" v-if="error">
                {{ error.password }}
              </span>
          </div>
        </div>

        <div class="flex items-center justify-between">
          <p class="text-sm text-gray-500">
            No account?
            <a class="underline" href="">Sign up</a>
          </p>

          <button type="button" v-on:click="login"
            class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white">
            Sign in
          </button>
        </div>
      </form>
    </div>

    <div id="lalo" class="relative h-64 w-full sm:h-96 lg:h-full lg:w-1/2">
      <img alt="Welcome"  src="https://static.onecms.io/wp-content/uploads/sites/6/2020/04/06/BCS_508_GL_0802_0496_RT.jpg"
        class="absolute inset-0 h-full w-full object-cover" />
    </div>
  </section>
</template>
<script>
import { mapWritableState } from 'pinia'

import { useAuthStore } from '@/stores/auth'
export default {
  data() {
    return {
      email: "",
      password: "",
      error: null,
    };
  },
  computed: {
    ...mapWritableState(useAuthStore, {
      myOwnerror: 'error',
    }),
  },
  watch: {
    myOwnerror() {
      this.error = useAuthStore().error;
    },
  },
  methods: {
    login() {
      useAuthStore().login(this.email, this.password);
    },
  },
};
</script>
<style scoped>
@media (max-width: 1024px) {
  #lalo {
    display: none;
  }
}
</style>