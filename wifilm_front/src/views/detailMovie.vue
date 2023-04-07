<template>
  <section>
    <div class="relative mx-auto max-w-screen-xl px-4 py-8">


      <div class="grid gap-8 lg:grid-cols-4 lg:items-start">
        <div class="lg:col-span-3">
          
          <div class="relative mt-4">
            <img alt="Tee" :src="movie.image" class="h-72 w-full rounded-xl object-cover lg:h-[540px]" />


          </div>


        </div>

        <div v-if="can == true" class="lg:sticky lg:top-0">
          <form class="space-y-4 lg:pt-8">
            <div>
              <p class="text-xl font-bold text-white">{{ movie.name }}</p>
            </div>
            <div class="flex items-center">
              <div v-for="r in rate">
                <svg aria-hidden="true" @click="rating(r)" class="w-5 h-5 text-yellow-400" fill="currentColor"
                  viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <title>First star</title>
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                  </path>
                </svg>
              </div>
              <div v-for="r in norate">
                <svg aria-hidden="true" @click="rating(r + rate)" class="w-5 h-5 text-gray-400" fill="currentColor"
                  viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <title>First star</title>
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                  </path>
                </svg>
              </div>
            </div>
            <div>

              <label for="message" class="block mb-2 text-sm font-medium text-white dark:text-white">Your message</label>
              <textarea id="message" rows="4" v-model="comment"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="I like the secend season"></textarea>

            </div>
            <button @click="rateMovie" type="button"
              class="w-full rounded bg-red-700 px-6 py-3 text-sm font-bold uppercase tracking-wide text-white">
              RATE
            </button>
          </form>
        </div>
        <div v-if="can == false" class="lg:sticky lg:top-0">
          <form class="space-y-4 lg:pt-8">
            <div>
              <p class="text-xl font-bold text-white">{{ movie.name }}</p>
            </div>
            <div class="flex items-center">
              <div v-for="r in rate">
                <svg aria-hidden="true" @click="rating(r)" class="w-5 h-5 text-yellow-400" fill="currentColor"
                  viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <title>First star</title>
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                  </path>
                </svg>
              </div>
              <div v-for="r in norate">
                <svg aria-hidden="true" @click="rating(r + rate)" class="w-5 h-5 text-gray-400" fill="currentColor"
                  viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <title>First star</title>
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                  </path>
                </svg>
              </div>
            </div>
            <div>

              <label for="message" class="block mb-2 text-sm font-medium text-white dark:text-white">Your message</label>
              <textarea id="message" rows="4" v-model="comment"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="I like the secend season"></textarea>

            </div>
            <button @click="editrateMovie" type="button"
              class="w-full rounded bg-green-700 px-6 py-3 text-sm font-bold uppercase tracking-wide text-white">
              EDIT
            </button>
          </form>
        </div>

        <div class="lg:col-span-3">
          <div class="prose max-w-none">
            <p class="text-white">
              Charts
            </p>
          </div>
        </div>
        <div class="lg:col-span-3">
          <charts :numberofrating="AnalyticsData.numberofrating" :onestar="AnalyticsData.onestar"
            :twostar="AnalyticsData.twostar" :threestar="AnalyticsData.threestar" :fourstar="AnalyticsData.fourstar"
            :fivestar="AnalyticsData.fivestar" :average="AnalyticsData.average" />
        </div>

      </div>
    </div>
  </section>
  <section class="">
    <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 md:py-16 lg:px-8">
      <div class="mx-auto max-w-3xl text-center">
        <h2 class="text-3xl font-bold text-white sm:text-4xl">
          {{ movie.name }}
        </h2>

        <p class="mt-4 text-white sm:text-xl">
          {{ movie.description }}..
        </p>
      </div>

      <div class="mt-8 sm:mt-12">
        <dl class="flex justify-between mx-5">
          <div class="flex flex-col rounded-lg border mx-5 border-gray-100 px-4 py-8 w-2/4 text-center">
            <dt class="order-last text-lg font-medium text-white">
              WI
            </dt>

            <dd class="text-4xl font-extrabold text-yellow-400 md:text-5xl">
              {{ AnalyticsData.positive }}%
            </dd>
          </div>
          <div class="flex flex-col rounded-lg border mx-5 border-gray-100 px-4 py-8 w-2/4 text-center">
            <dt class="order-last text-lg font-medium text-white">
              NO
            </dt>

            <dd class="text-4xl font-extrabold text-yellow-400 md:text-5xl">
              {{ AnalyticsData.negative }}%

            </dd>
          </div>
        </dl>
      </div>
    </div>
  </section>
</template>
<script>
import router from '../router';
import { useAuthStore } from '@/stores/auth'
import { useFxStore } from '@/stores/fx'
import { mapWritableState } from 'pinia'
import charts from '../components/charts.vue'
export default {
  data() {
    return {
      movie: {},
      rate: 1,
      norate: 4,
      comment: '',
      can: true,
      myreviews: [],
      users_id: useAuthStore().id,
      AnalyticsData: {
        numberofrating: 0,
        onestar: 0,
        twostar: 0,
        threestar: 0,
        fourstar: 0,
        fivestar: 0,
        average: 0,
      },
    }
  },
  props: {
    id: {
      type: String,
      required: true
    }
  },
  mounted() {
    useFxStore().loading = true;
    axios.get('http://127.0.0.1:8000/api/movies/' + this.id, {
      headers: {
        'Authorization': 'Bearer ' + localStorage.getItem('token')
      }
    })
      .then(response => {
        this.movie = response.data;
      })
      .catch(error => {
        console.log(error);
      })
      .finally(() => {
        useFxStore().loading = false;
      });
    this.checkifRated();
    this.Analytics();

  },
  components: {
    charts
  },
  methods: {
    Analytics() {
      axios.get('http://127.0.0.1:8000/api/reviews/' + this.id, {
        headers: {
          'Authorization': 'Bearer ' + localStorage.getItem('token')
        }
      })
        .then(response => {
          this.AnalyticsData = response.data;
          console.log(this.AnalyticsData);
        })
        .catch(error => {
          console.log(error);
        })
        .finally(() => {
          useFxStore().loading = false;
        });
    },
    checkifRated() {
      useFxStore().loading = true;
      axios.post('http://127.0.0.1:8000/api/check', {
        "movies_id": this.id,
        "users_id": this.users_id
      },
        {
          headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token')
          }
        }
      )
        .then(response => {
          if (response.data.message == 'can') {
            this.can = true;
          } else {
            this.can = false;
            this.myreviews = response.data.data;
            this.Analytics();
          }
        })
        .catch(error => {
          console.log(error);
        })

    },
    rating(rating) {
      this.rate = rating;
    },
    rateMovie() {
      axios.post('http://127.0.0.1:8000/api/reviews',
        {
          "review": this.rate,
          "comment": this.comment,
          "movies_id": this.id,
          "users_id": useAuthStore().id

        },
        {
          headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token')
          }
        }
      )
        .then(response => {
          this.checkifRated();
          console.log(response);
        })
        .catch(error => {
          console.log(error);
        })

    },
    editrateMovie() {
      axios.put('http://127.0.0.1:8000/api/reviews/' + this.myreviews.id,
        {
          "review": this.rate,
          "comment": this.comment,
          "movies_id": this.id,
          "users_id": useAuthStore().id

        },
        {
          headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('token')
          }
        }
      )
        .then(response => {
          console.log(response);
          this.checkifRated();
        })
        .catch(error => {
          console.log(error);
        })

    }
  },
  watch: {
    myreviews() {
      this.rate = this.myreviews.review;
      this.comment = this.myreviews.comment;
      this.norate = 5 - this.rate;
    },
    rate() {
      this.norate = 5 - this.rate;
    },
    myOwnName() {
      this.users_id = this.myOwnName
      this.checkifRated();

    }
  },
  computed: {
    ...mapWritableState(useAuthStore, {
      myOwnName: 'id',
    }),
  }
}
</script>