<template>
    <div
        class="fixed drop-shadow-2xl top-0 left-0 right-0 bottom-0 w-full h-screen z-50 overflow-hidden   flex flex-col items-center justify-center">
        <div class="bg-white mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="flex justify-end" @click="close">
                <i class="left-0 fa-solid text-xl fa-xmark"></i>
            </div>
            <div class="mx-auto max-w-lg text-center">
                <h1 class="text-2xl font-bold sm:text-3xl">Add Actor information!</h1>

            </div>

            <div action="" class="mx-auto mt-8 mb-0 max-w-md space-y-4">
                <div class=" flex justify-center">
                    <i v-if="loading" class="fa-sharp fa-solid fa-spinner text-xl fa-spin"></i>
                    <img v-else :src="image" class="rounded-full w-32 h-32" alt="">
                </div>
                <div>
                    <div class="relative">
                        <input type="text" v-model="name"
                            class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm"
                            placeholder="name of actor" />

                        <span class="absolute inset-y-0 right-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div>
                    <div class="relative">
                        <input type="text" v-model="description"
                            class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm"
                            placeholder="Description of actor" />

                        <span class="absolute inset-y-0 right-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div>
                    <div class="relative">
                        <input type="file" v-on:change="uploadimage"
                            class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semiboldfile:bg-violet-50 file:text-gray-700 hover:file:bg-violet-100" />

                        <span class="absolute inset-y-0 right-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div>
                    <div class="relative">
                        <div class="flex flex-wrap justify-center">
                            <span v-for="movie in selectedmovie" @click="Deletemovie(movie)"
                                class="mx-1 my-1 whitespace-nowrap rounded-full bg-purple-100 px-2.5 py-0.5 text-sm text-purple-700">
                                {{ movie.name }}
                            </span>
                        </div>
                        <input type="text" v-model="movie"
                            class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm"
                            placeholder="drama , action" />

                        <span class="absolute inset-y-0 right-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </span>
                    </div>
                    <div class="m-4 mx-1 my-1 flex justify-center flex-wrap">
                        <span v-for="movie in movies" @click="AddMovie(movie)"
                            class=" whitespace-nowrap rounded-full bg-purple-100 px-2.5 py-0.5 text-sm text-green-700">
                            {{ movie.name }}
                        </span>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <button type="button" @click="add"
                        class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white">
                        add
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            name: '',
            description: '',
            image: '',
            movie: '',
            loading: false,
            selectedmovie: [],
            movies: [],
            id: '',
        }
    },
    methods: {
        Deletemovie(movie) {
            this.selectedmovie = this.selectedmovie.filter(item => item.id !== movie.id);
            this.movies.push(movie);
        },
        AddMovie(movie) {
            if (this.selectedmovie.find(item => item.id === movie.id)) {
                alert('already exist');
            } else {
                this.selectedmovie.push(movie);
                this.movies = this.movies.filter(item => item.id !== movie.id);
            }
        },
        getMovies() {
            axios.get('http://127.0.0.1:8000/api/searshformovies/' + this.movie, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            })
                .then(response => {
                    this.movies = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        },
        close() {
            this.$parent.openedform = '';
        },
        add() {
            this.$parent.getactorstatus = true;
            axios.post('http://127.0.0.1:8000/api/actors',
                {
                    "name": this.name,
                    "description": this.description,
                    "image": this.image
                },
                {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                    }
                }
            )
                .then(response => {
                    this.id = response.data.id;
                    this.AddMovieToActorProfile(this.selectedmovie);
                    this.$parent.getActors();
                })
        },
        AddMovieToActorProfile(movies) {
            axios.post('http://127.0.0.1:8000/api/actors_movies',
                {
                    "actors_id": this.id,
                    "movies": movies
                },
                {

                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                    }
                })
        },
        uploadimage(event) {
            this.loading = true;
            let file = event.target.files[0];
            let formData = new FormData();
            formData.append('file', file);
            formData.append('upload_preset', 'a8vbtvzm');
            axios.post('https://api.cloudinary.com/v1_1/dvr7oyo77/upload', formData)
                .then(response => {
                    this.loading = false;
                    this.image = response.data.secure_url;
                })
        },

    },
    watch: {
        movie() {
            if (this.movie == "") {
                this.movies = [];
            } else {
                this.getMovies();
            }
        }
    }

}
</script>
<style scoped></style>