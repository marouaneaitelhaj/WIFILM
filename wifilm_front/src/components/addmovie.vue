<template>
    <div
        class="fixed drop-shadow-2xl top-0 left-0 right-0 bottom-0 w-full h-screen z-50 overflow-hidden   flex flex-col items-center justify-center">
        <div class="w-full sm:w-10/12 md:w-8/12 lg:w-6/12 xl:w-4/12 bg-white mx-auto max-w-screen-xl px-2 py-10 sm:px-6 lg:px-8 max-md:w-10/12">
            <div class="flex justify-end" @click="close">
                <i class="left-0 fa-solid text-xl fa-xmark"></i>
            </div>
            <div class="mx-auto max-w-lg text-center">
                <h1 class="text-2xl font-bold">Add movie information!</h1>

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
                            placeholder="name of movie" />

                        <span class="absolute inset-y-0 right-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </span>
                        <span v-for="errorName in errors.name" class="text-red-600">
                            {{ errorName }}
                        </span>
                    </div>
                </div>
                <div>
                    <div class="relative">
                        <input type="text" v-model="description"
                            class="w-full rounded-lg border-gray-200 p-4 pr-12 text-sm shadow-sm"
                            placeholder="Description of movie" />

                        <span class="absolute inset-y-0 right-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </span>
                        <span v-for="errorName in errors.description" class="text-red-600">
                            {{ errorName }}
                        </span>
                    </div>
                </div>
                <div>
                    <div class="relative">
                        <div class="flex justify-center flex-wrap h-10 overflow-auto">
                            <span v-for="genre in selectedgenre" @click="DeleteGenre(genre)"
                                class=" whitespace-nowrap rounded-full bg-purple-100 px-2.5 py-0.5 text-sm text-purple-700">
                                {{ genre.name }}
                            </span>
                        </div>
                        <input type="text" v-model="genre"
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
                    <div class="m-4 flex flex-wrap h-10 overflow-auto justify-center">
                        <span v-for="genre in genres" @click="AddGenre(genre)"
                            class=" whitespace-nowrap rounded-full bg-purple-100 px-2.5 py-0.5 mb-1 text-sm text-green-700">
                            {{ genre.name }}
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
                        <span v-for="errorName in errors.image" class="text-red-600">
                            {{ errorName }}
                        </span>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <button type="button" @click="add"
                        class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white">
                        Add
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
            loading: false,
            genres: [],
            genre: '',
            selectedgenre: [],
            id: '',
            errors: []
        }
    },
    watch: {
        genre() {
            if (this.genre == "") {
                this.genres = [];
            } else {
                this.getgenres();
            }
        }
    },
    methods: {
        DeleteGenre(genre) {
            this.selectedgenre = this.selectedgenre.filter(item => item.id !== genre.id);
        },
        AddGenre(genre) {
            if (this.selectedgenre.length < 3) {
                if (this.selectedgenre.includes(genre)) {

                } else {
                    this.selectedgenre.push(genre);
                }
            } else {
                alert('you can select only 3 genres');
            }
        },
        getgenres() {
            axios.get('http://127.0.0.1:8000/api/searshforgenres/' + this.genre, {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
            })
                .then(response => {
                    this.genres = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        },
        close() {
            this.$parent.openedform = '';
        },
        add() {
            axios.post('http://127.0.0.1:8000/api/movies',
                {
                    "name": this.name,
                    "description": this.description,
                    "image": this.image,
                },
                {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                    }
                }
            )
                .then(response => {
                    console.log(response.data.id);
                    this.id = response.data.id;
                    for (let i = 0; i < this.selectedgenre.length; i++) {
                        this.insertintogenresmovies(this.selectedgenre[i].id);
                    }
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                })

        },
        insertintogenresmovies(selectedgenre) {
            axios.post('http://127.0.0.1:8000/api/genresmovies',
                {
                    "movies_id": this.id,
                    "genres_id": selectedgenre
                },
                {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                    }
                }
            )
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
        }
    }

}
</script>
<style scoped></style>