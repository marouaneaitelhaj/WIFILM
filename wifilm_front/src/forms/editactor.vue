<template>
    <div
        class="fixed drop-shadow-2xl top-0 left-0 right-0 bottom-0 w-full h-screen z-50 overflow-hidden   flex flex-col items-center justify-center">
        <div class="bg-white mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="flex justify-end" @click="close">
                <i class="left-0 fa-solid text-xl fa-xmark"></i>
            </div>
            <div class="mx-auto max-w-lg text-center">
                <h1 class="text-2xl font-bold sm:text-3xl">Update genre information!</h1>

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
                <div class="flex items-center justify-between">
                    <button type="button" @click="edit"
                        class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white">
                        Edit
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
            loading: false
        }
    },
    props: {
        id: {
            type: Number,
            required: true
        }
    },
    mounted() {
        this.getactors();

    },
    methods: {
        getactors() {
            axios.get('http://127.0.0.1:8000/api/actors/' + this.id, {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
            })
                .then(response => {
                    this.name = response.data.name;
                    this.description = response.data.description;
                    this.image = response.data.image;
                })
                .catch(error => {


                    console.log(error);
                })
        },
        close() {
            console.log('close');
            console.log(this.$parent.isformopen);
            this.$parent.isformopen = false;
        },
        edit() {
            this.$parent.getactorstatus = true;
            axios.put('http://127.0.0.1:8000/api/actors/' + this.id,
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
                    console.log(response);
                    this.$parent.getActors();
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
        }
    }

}
</script>
<style scoped></style>