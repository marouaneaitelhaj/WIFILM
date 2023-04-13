<template>
  <section class="">
    <video muted class="w-screen h-screen object-cover -z-20 brightness-25 fixed top-0" autoplay>
      <source
        src="https://imdb-video.media-imdb.com/vi1034274073/1434659607842-pgv4ql-1666270980393.mp4?Expires=1681431861&Signature=sNP8vj5EIkVHCAkMBMfntj2ZaT7Wp45suy6EvPrFFbRObZOeczQdSa7I~2ee4Eg40cbqZPXf3tYni--gyLBThkZ7RnvmgBybYb5CTbkVuLyig-wSuxUtjhHBM55NvbmYMztthAorCkFbisaKnfsFVxn164qdscgzr4C4QxarF2KzTZ5WrBgzQh5-tYYGriEuxQwMDILvc3JWj9vqWiQixtxRyneMdS-NPr3mwZC3W68AR6a6HxnJJbaaNVbWCftul8oHQRYmGwPePGNAF722p7jcYmwvPW1LBmv1xJ3MvbYta8BjtUOD8FNF8UsWhHKtOV2DXhsGQHrayUY3X5QoGg__&Key-Pair-Id=APKAIFLZBVQZ24NQH3KA"
        type="video/mp4">
    </video>
    <div class="mx-auto  max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center">
      <div class="mx-auto  max-w-xl text-center">
        <h1 class="text-3xl font-extrabold sm:text-5xl shadow-sm">
          <span class="text-white">BETTER CALL </span>
          <span class="text-yellow-400">WIFILM</span>
        </h1>
        <button class="btn-primary bg-yellow-400 px-4 rounded-md rotate-12 font-bold">Join US</button>
      </div>
    </div>
  </section>
  <div class="m-2 bg-black">
    <div class="w-full flex max-sm:flex-col">
      <div class="w-3/5 flex justify-center items-center max-sm:w-full">
        <div class="m-2">
          <img class="object-cover w-full" :src="firstMovie.url" alt="">
        </div>
      </div>
      <div class="w-2/5 my-5 flex justify-center items-center max-sm:w-full">
        <div class="flex justify-center items-center flex-col">
          <h1 class="text-white font-bold text-2xl ">{{ firstMovie.caption }}</h1>
        </div>
      </div>
    </div>
    <div class="w-full  flex max-sm:flex-col-reverse">
      <div class="w-2/5 my-5 flex justify-center items-center max-sm:w-full">
        <div class="flex justify-center items-center flex-col">
          <h1 class="text-white font-bold text-2xl md:text-xl ">{{ secondMovie.caption }}</h1>
        </div>
      </div>
      <div class="w-3/5 flex justify-center items-center max-sm:w-full">
        <div class="m-2">
          <img class="object-cover w-full" :src="secondMovie.url" alt="">
        </div>
      </div>
    </div>
    <div class="w-full  flex max-sm:flex-col">
      <div class="w-3/5 flex justify-center items-center max-sm:w-full">
        <div class="m-2">
          <img class="object-cover w-full" :src="thirdMovie.url" alt="">
        </div>
      </div>
      <div class="w-2/5 my-5 flex justify-center items-center max-sm:w-full">
        <div class="flex justify-center items-center flex-col">
          <h1 class="text-white font-bold text-2xl md:text-xl ">{{ thirdMovie.caption }}</h1>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      firstMovie: '',
      secondMovie: '',
      thirdMovie: '',
    };
  },
  mounted() {
    // three random numbers between 0 and 24 and unique
    const randomNumbers = [...new Set(Array.from({ length: 3 }, () => Math.floor(Math.random() * 25)))];
    const options = {
      method: 'GET',
      url: 'https://imdb8.p.rapidapi.com/title/get-images',
      params: { tconst: 'tt0944947', limit: '25' },
      headers: {
        'X-RapidAPI-Key': '3b8a341351msh0941e89d8a233fap1d4700jsn42ffa694f126',
        'X-RapidAPI-Host': 'imdb8.p.rapidapi.com'
      }
    };
    axios.request(options)
      .then(response => {
        this.firstMovie = response.data.images[randomNumbers[0]];
        this.secondMovie = response.data.images[randomNumbers[1]];
        this.thirdMovie = response.data.images[randomNumbers[2]];
      })
      .catch(error => {
        console.error(error);
      });
  },

};
</script>