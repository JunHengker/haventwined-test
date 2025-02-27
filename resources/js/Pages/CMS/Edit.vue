<script setup>
import { ref, onMounted } from 'vue'
import {
  Edit,
  Trash2,
  Calendar,
  MapPin,
  Clock,
  Users,
  Image as ImageIcon,
  Save,
  X
} from 'lucide-vue-next'
import { router, Head } from '@inertiajs/vue3'
import axios from 'axios'
import { format } from 'date-fns'
import AdminLayout from '../../Layouts/Layout-Admin.vue'
defineOptions({ layout: AdminLayout })

const formData = ref({
  title: '',
  description: '',
  category: '',
  event_date: '',
  registration_start: '',
  registration_end: '',
  time_start: '',
  time_end: '',
  participant_estimate: '',
  location: '',
  city: '',
  detailed_location: '',
  image: null
})

const imagePreview = ref(null)
const isEditing = ref(false)
const editingId = ref(null)
const events = ref([])

const categories = [
  'festival', 'fair', 'bazaar', 'exhibiton', 'expo', 'pameran', 'pensi', 'acara_sekolah', 'acara_kampus', 'other'
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

const handleImageUpload = (e) => {
  const file = e.target.files[0]
  if (file) {
    formData.value.image = file
    imagePreview.value = URL.createObjectURL(file)
  }
}

const resetForm = () => {
  formData.value = {
    title: '',
    description: '',
    category: '',
    event_date: '',
    registration_start: '',
    registration_end: '',
    time_start: '',
    time_end: '',
    participant_estimate: '',
    location: '',
    city: '',
    detailed_location: '',
    image: null
  }
  imagePreview.value = null
  isEditing.value = false
  editingId.value = null
}

const validateFormData = () => {
  const {
    title,
    description,
    category,
    event_date,
    registration_start,
    registration_end,
    time_start,
    time_end,
    participant_estimate,
    location,
    city,
    detailed_location,
    image
  } = formData.value

  if (
    !title ||
    !description ||
    !category ||
    !event_date ||
    !registration_start ||
    !registration_end ||
    !time_start ||
    !time_end ||
    !participant_estimate ||
    !location ||
    !city ||
    !detailed_location ||
    !image
  ) {
    alert('Please fill in all fields')
    return false
  }

  return true
}

const handleSubmit = async () => {
  try {
    if (!validateFormData()) return

    const data = new FormData()
    data.append('title', formData.value.title)
    data.append('description', formData.value.description)
    data.append('category', formData.value.category)
    data.append('event_date', formData.value.event_date)
    data.append('registration_start', formData.value.registration_start)
    data.append('registration_end', formData.value.registration_end)
    data.append('time_start', formData.value.time_start)
    data.append('time_end', formData.value.time_end)
    data.append('participant_estimate', formData.value.participant_estimate)
    data.append('location', formData.value.location)
    data.append('city', formData.value.city)
    data.append('detailed_location', formData.value.detailed_location)

    if (formData.value.image) {
      data.append('image', formData.value.image)
    }

    if (isEditing.value) {
      await router.post(`/update/${editingId.value}`, data, {
        headers: { 'Content-Type': 'multipart/form-data' }
      })
    } else {
      await router.post('/create', data, {
        headers: { 'Content-Type': 'multipart/form-data' }
      })
    }

    resetForm()
    fetchEvents()
  } catch (error) {
    console.error('Error submitting form:', error)
  }
}

const editEvent = (event) => {
  formData.value = { ...event }
  imagePreview.value = event.image
  isEditing.value = true
  editingId.value = event.id
}

const deleteEvent = async (id) => {
  if (confirm('Are you sure you want to delete this event?')) {
    try {
      await router.post('/delete', { id })
      fetchEvents()
    } catch (error) {
      console.error('Error deleting event:', error)
    }
  }
}

onMounted(fetchEvents)
</script>

<template>
  <Head title="Edit" />
  <nav class="fixed w-full bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm z-50 border-b border-gray-200 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-18">
        <div class="flex items-center">
          <a href="/dashboard">
            <img src="../../../../public/assets/logo-haven.png" alt="HavenTwined" class="w-[12em]" />
          </a>
        </div>
      </div>
    </div>
  </nav>
  <div class="min-h-screen bg-gray-50 dark:bg-gray-900 pt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 mb-8">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
          {{ isEditing ? 'Edit Event' : 'Create New Event' }}
        </h2>

        <form @submit.prevent="handleSubmit" class="space-y-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                Title
              </label>
              <input
                v-model="formData.title"
                type="text"
                required
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white"
              />
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                Category
              </label>
              <select
                v-model="formData.category"
                required
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white"
              >
                <option value="">Select Category</option>
                <option v-for="category in categories" :key="category" :value="category">
                  {{ category }}
                </option>
              </select>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                Event Date
              </label>
              <input
                v-model="formData.event_date"
                type="date"
                required
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white"
              />
            </div>

            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  Start Time
                </label>
                <input
                  v-model="formData.time_start"
                  type="time"
                  required
                  class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white"
                />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  End Time
                </label>
                <input
                  v-model="formData.time_end"
                  type="time"
                  required
                  class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white"
                />
              </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  Registration Start
                </label>
                <input
                  v-model="formData.registration_start"
                  type="date"
                  required
                  class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white"
                />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                  Registration End
                </label>
                <input
                  v-model="formData.registration_end"
                  type="date"
                  required
                  class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white"
                />
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                City
              </label>
              <input
                v-model="formData.city"
                type="text"
                required
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white"
              />
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                Estimated Participants
              </label>
              <input
                v-model="formData.participant_estimate"
                type="number"
                required
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white"
              />
            </div>
          </div>

          <div class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                Location Name
              </label>
              <input
                v-model="formData.location"
                type="text"
                required
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white"
              />
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                Detailed Location
              </label>
              <textarea
                v-model="formData.detailed_location"
                rows="2"
                required
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white"
              ></textarea>
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
              Description
            </label>
            <textarea
              v-model="formData.description"
              rows="4"
              required
              class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white"
            ></textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
              Event Image
            </label>
            <div class="mt-1 flex items-center space-x-4">
              <label class="cursor-pointer inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <ImageIcon class="h-5 w-5 mr-2" />
                Choose Image
                <input
                  type="file"
                  class="hidden"
                  accept="image/*"
                  @change="handleImageUpload"
                />
              </label>
              <div v-if="imagePreview && !isEditing" class="relative">
                <img
                  :src="imagePreview"
                  alt="Preview"
                  class="h-20 w-20 object-cover rounded-lg"
                />
                <button
                  @click="imagePreview = null"
                  class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600"
                >
                  <X class="h-4 w-4" />
                </button>
              </div>
            </div>
          </div>

          <div class="flex justify-end space-x-4">
            <button
              type="button"
              @click="resetForm"
              class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700"
            >
              Cancel
            </button>
            <button
              type="submit"
              class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700 flex items-center"
            >
              <Save class="h-5 w-5 mr-2" />
              {{ isEditing ? 'Update Event' : 'Create Event' }}
            </button>
          </div>
        </form>
      </div>

      <div class="space-y-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
          Events
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div
            v-for="event in events"
            :key="event.id"
            class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden"
          >
            <div class="relative h-48">
              <img
                :src="`/storage/${event.image}`"
                class="w-full h-full object-cover"
              />
              <div class="absolute top-4 right-4 space-x-2">
                <button
                  @click="editEvent(event)"
                  class="p-2 bg-white dark:bg-gray-800 rounded-full shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700"
                >
                  <Edit class="h-5 w-5 text-gray-600 dark:text-gray-400" />
                </button>
                <button
                  @click="deleteEvent(event.id)"
                  class="p-2 bg-white dark:bg-gray-800 rounded-full shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700"
                >
                  <Trash2 class="h-5 w-5 text-red-600" />
                </button>
              </div>
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
    </div>
  </div>
</template>
