<script setup>
import {
  ChevronRight, 
  Users,
  Calendar,
  MapPin,
  Clock ,
  Phone,
  Mail,
  Map
} from 'lucide-vue-next'
import { ref, computed } from 'vue'
import { usePage, Head } from '@inertiajs/vue3'
import { format } from 'date-fns'

import HomeLayout from '../Layouts/Layout-Home.vue'
defineOptions({ layout: HomeLayout })

import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide } from 'vue3-carousel'

const banners = [
  { src: '/assets/banner1.jpg', alt: 'Banner 1'},
    { src: '/assets/banner2.jpg', alt: 'Banner 2'},
    { src: '/assets/banner3.jpg', alt: 'Banner 3'}
]

const fetchEvents = async () => {
  try {
    const response = await axios.get('/events') 

    events.value = response.data.map(event => ({
      ...event,
      event_date: format(new Date(event.event_date), 'yyyy-MM-dd'),
      registration_start: format(new Date(event.registration_start), 'yyyy-MM-dd'),
      registration_end: format(new Date(event.registration_end), 'yyyy-MM-dd'),
    }))
  } catch (error) {
    console.error('Error fetching events:', error)
  }
}

const events = ref([])
fetchEvents()

const fetchProfile = async () => {
    try {
        const response = await axios.get('/companies')

        if (Array.isArray(response.data) && response.data.length > 0) {
            const companyData = response.data[0]

            company.value = companyData
        } else {
            company.value = []
        }
    } catch (error) {
        console.error('Error fetching company profile:', error)
    }
}

const company = ref([])
fetchProfile()

const page = usePage()
const user = computed(() => page.props.auth.user)

</script>

<template>
  <Head title="Home" />
  <div class="min-h-screen bg-white dark:bg-gray-900">
    <section id="home" class="pt-32 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center">
               
                <Carousel :autoplay="4000" :wrap-around="true" class="mb-6">
                    <Slide v-for="banner in banners" :key="banner.src">
                        <img :src="banner.src" :alt="banner.alt" class="w-full xl:h-96 lg:h-86 md:h-56 rounded-lg object-cover" />
                    </Slide>
                </Carousel>

                <p class="text-xl text-gray-600 dark:text-gray-400 mb-8 max-w-3xl mx-auto">
                Jadilah Tenant pada Event Pilihanmu dengan Mudah, Cepat, dan Terpercaya.
                </p>

                <a
                v-if="!user"
                href="/login"
                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 transition-colors"
                >
                Login
                <ChevronRight class="ml-2 h-5 w-5" />
                </a>
                <a
                v-else
                href="/dashboard"
                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 transition-colors"
                >
                Dashboard
                <ChevronRight class="ml-2 h-5 w-5" />
                </a>
            </div>
        </div>
    </section>

    <section id="about" class="py-20 bg-gray-50 dark:bg-gray-800 mt-[4em]">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="text-center mb-12">
              <h2 class="text-5xl font-bold text-emerald-600 dark:text-emerald-400">
                  Tentang Kami
              </h2>
              <p class="mt-4 text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                  {{ company.description }}
              </p>
          </div>

          <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
              <div class="relative">
                  <img 
                      :src="`/storage/${company.banner}`" 
                      alt="Company Banner" 
                      class="w-full rounded-lg shadow-lg object-cover h-96"
                  />
              </div>

              <div>
                  <div class="space-y-6">
                      <div class="flex items-center space-x-4">
                          <div class="bg-emerald-100 dark:bg-emerald-900 p-3 rounded-lg">
                              <Phone class="h-6 w-6 text-emerald-600 dark:text-emerald-400" />
                          </div>
                          <div>
                              <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Nomor</p>
                              <p class="text-lg font-semibold text-emerald-600 dark:text-emerald-400">
                                  {{ company.number }}
                              </p>
                          </div>
                      </div>

                      <div class="flex items-center space-x-4">
                          <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-lg">
                              <Mail class="h-6 w-6 text-blue-600 dark:text-blue-400" />
                          </div>
                          <div>
                              <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Email</p>
                              <p class="text-lg font-semibold text-emerald-600 dark:text-emerald-400">
                                  {{ company.email }}
                              </p>
                          </div>
                      </div>

                      <div class="flex items-center space-x-4">
                          <div class="bg-gray-100 dark:bg-gray-800 p-3 rounded-lg">
                              <Map class="h-6 w-6 text-gray-600 dark:text-gray-400" />
                          </div>
                          <div>
                              <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</p>
                              <p class="text-lg font-semibold text-emerald-600 dark:text-emerald-400">
                                  {{ company.address }}
                              </p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>


    <section id="event" class="pb-20 pt-10 bg-gray-50 dark:bg-gray-900">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-5">
            <h2 class="text-5xl font-bold text-gray-900 dark:text-white">
            Jelajahi Events
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
              <div
                  v-for="event in events"
                  :key="event.id"
                  class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden"
              >
                  <div class="relative h-48">
                    <img
                        :src="`/storage/${event.image}`"
                        class="w-full h-full object-cover"
                    />
                  </div>

                  <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="px-3 py-1 bg-emerald-100 dark:bg-emerald-900 text-emerald-800 dark:text-emerald-200 text-sm rounded-full">
                          {{ event.category }}
                        </span>
                        <span class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                          <Users class="h-4 w-4 mr-1" />
                          {{ event.participant_estimate }}
                        </span>
                    </div>

                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                        {{ event.title }}
                    </h3>

                    <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <div class="flex items-center">
                          <Calendar class="h-4 w-4 mr-2" />
                          {{ (event.event_date) }}
                        </div>
                        <div class="flex items-center">
                          <Clock class="h-4 w-4 mr-2" />
                          {{ event.time_start }} - {{ event.time_end }}
                        </div>
                        <div class="flex items-center">
                          <MapPin class="h-4 w-4 mr-2" />
                          {{ event.location }}, {{ event.city }}
                        </div>
                    </div>
                  </div>
              </div>
            </div>
      </div>
    </section>
  </div>
</template>

<style scoped>
html {
  scroll-behavior: smooth;
}

@media (prefers-reduced-motion: reduce) {
  html {
    scroll-behavior: auto;
  }
}
</style>