<script setup>
import { ref, computed } from 'vue'
import { Edit, Calendar, MapPin, Clock, Users, Building } from 'lucide-vue-next'
import { format } from 'date-fns'
import { usePage, Head } from '@inertiajs/vue3'
import AdminLayout from '../Layouts/Layout-Admin.vue'

defineOptions({ layout: AdminLayout })

const page = usePage()
const user = computed(() => page.props.auth.user)

// for Buttons
const buttons = [
  {
    title: 'Edit Events',
    description: 'Create, Update, and Delete an Event',
    link: '/edit',
    icon: Edit
  },
  {
    title: 'Edit Profile',
    link: '/company',
    description: 'Edit Company Profile Details',
    icon: Building
  }
]

// fetching events
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
</script>

<template>
  <Head title="Dashboard" />
  <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <nav class="fixed w-full bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm z-50 border-b border-gray-200 dark:border-gray-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-18">
          <div class="flex items-center">
            <a href="/">
              <img src="../../../../public/assets/logo-haven.png" alt="HavenTwined" class="w-[12em]" />
            </a>
          </div>
        </div>
      </div>
    </nav>

    <section id="Greetings" class="relative bg-white dark:bg-gray-900">
      <div class="pt-24 pb-8 px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
            Welcome to HavenTwined Admin Panel
          </h1>
          <p v-if="user" class="text-2xl text-gray-700 dark:text-gray-300">
            Hello, {{ user.name }}!
          </p>
        </div>
      </div>
    </section>

    <section id="buttons" class="py-4">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-8">
          <div
            v-for="button in buttons"
            :key="button.title"
            class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow"
          >
            <a class="text-center flex flex-row gap-4 items-center w-full" :href="button.link">
              <component
                :is="button.icon"
                class="h-12 w-12 text-emerald-600 dark:text-emerald-400 mb-2"
              />
              <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-3">
                {{ button.title }}
              </h2>
            </a>
            <p class="text-gray-600 dark:text-gray-400">
              {{ button.description }}
            </p>
          </div>
        </div>
      </div>
    </section>

    <section id="showcase">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-5">
        <h2 class="text-5xl font-bold text-gray-900 dark:text-white">
          Events
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
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
                  {{ event.event_date }}
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
@media (max-width: 768px) {
  .md\:pl-64 {
    padding-left: 0;
  }
}
</style>
