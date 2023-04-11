<template>
  <section class="">
    <video muted class="w-screen h-screen object-cover -z-20 brightness-25 fixed top-0" autoplay>
      <source
        src="https://imdb-video.media-imdb.com/vi2830483993/1434659607842-pgv4ql-1648844517801.mp4?Expires=1681296920&Signature=DjOeynlXeowX1QMxP7uEwjjQ6fqcWmVrKeMWzXbbrk0K1B8Csji0GSYxVg0CDRmeDMBpbPnZmwqX5tkd8dq6EMFPPZq5Qg1m3iEoP71GqDBfcc-6bO35iQ~rhEV708YyOJAsgtq7u2-VQAp3CN4BJQmzuWB58aiGs~XsLSdHgfHrGz5hWiYoXvOrFEMzU19LCWhoJ-hGSkuSEHJk9dFaOlIB35kORZT10Q3xQjhCFGfsYnyKaO6fEcg1UqqQeq~S-3Z5l8yUd01PXPG~v1a1K3sITNssqausahf~pLfmrmv7w20bn0RVGigTNXxvycOjMkHNMfhAk5eou7aubtgegA__&Key-Pair-Id=APKAIFLZBVQZ24NQH3KA"
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
    const randomNumbers = Array.from({ length: 3 }, () => Math.floor(Math.random() * 10));
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