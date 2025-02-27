<script setup>
import { ref, onMounted } from 'vue'
import {
    Trash2,
    Image as ImageIcon,
    Save,
    X
} from 'lucide-vue-next'
import { router, Head } from '@inertiajs/vue3'
import axios from 'axios'
import AdminLayout from '../../Layouts/Layout-Admin.vue'
defineOptions({ layout: AdminLayout })

const formData = ref({
    description: '',
    number: '',
    email: '',
    address: '',
    banner: null
})

const bannerPreview = ref(null)
const isEditing = ref(false)
const editingId = ref(null)
const company = ref([])

const fetchProfile = async () => {
    try {
        const response = await axios.get('/companies')

        if (Array.isArray(response.data) && response.data.length > 0) {
            const companyData = response.data[0]

            company.value = companyData
            formData.value = {
                description: companyData.description || '',
                number: companyData.number || '',
                email: companyData.email || '',
                address: companyData.address || '',
                banner: null
            }
            bannerPreview.value = companyData.banner
            isEditing.value = true
            editingId.value = companyData.id
        } else {
            company.value = []
            resetForm()
        }
    } catch (error) {
        console.error('Error fetching company profile:', error)
    }
}

const handleImageUpload = (e) => {
    const file = e.target.files[0]
    if (file) {
        formData.value.banner = file
        bannerPreview.value = URL.createObjectURL(file)
    }
}

const resetForm = () => {
    formData.value = {
        description: '',
        number: '',
        email: '',
        address: '',
        banner: null
    }
    bannerPreview.value = null
    isEditing.value = false
    editingId.value = null
}

const validateFormData = () => {
    const {
        description,
        number,
        email,
        address,
        banner
    } = formData.value

    if (
        !description ||
        !number ||
        !email ||
        !address ||
        !banner
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
        data.append('description', formData.value.description)
        data.append('number', formData.value.number)
        data.append('email', formData.value.email)
        data.append('address', formData.value.address)

        if (formData.value.banner) {
            data.append('banner', formData.value.banner)
        }

        if (isEditing.value) {
            await router.post(`/company/update/${editingId.value}`, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
        } else {
            await router.post('/company/create', data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
        }

        resetForm()
        fetchProfile()
    } catch (error) {
        console.error('Error submitting form:', error)
    }
}

const deleteCompany = async (id) => {
    if (confirm('Are you sure you want to delete this profile?')) {
        try {
            await router.post('/company/delete', { id })
            fetchProfile()
        } catch (error) {
            console.error('Error deleting profile:', error)
        }
    }
}

onMounted(fetchProfile)
</script>

<template>
    <Head title="Company" />
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
                    {{ isEditing ? 'Edit Profile' : 'Create New Profile' }}
                </h2>

                <form @submit.prevent="handleSubmit" class="space-y-6">
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
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Number
                            </label>
                            <input
                                v-model="formData.number"
                                type="text"
                                required
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Email
                            </label>
                            <input
                                v-model="formData.email"
                                type="email"
                                required
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Address
                            </label>
                            <input
                                v-model="formData.address"
                                type="text"
                                required
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-emerald-500 dark:bg-gray-700 dark:text-white"
                            />
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Company Banner
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
                            <div v-if="bannerPreview && !isEditing" class="relative">
                                <img
                                    :src="bannerPreview"
                                    alt="Preview"
                                    class="h-20 w-20 object-cover rounded-lg"
                                />
                                <button
                                    @click="bannerPreview = null"
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
                            class="px-2 py-2 border border-gray-300 dark:border-gray-600 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700"
                        >
                            Cancel
                        </button>

                        <button
                            v-if="isEditing"
                            type="button"
                            @click="deleteCompany(company.id)"
                            class="px-2 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 flex items-center"
                        >
                            <Trash2 class="h-5 w-5 mr-2" />
                            Delete
                        </button>

                        <button
                            type="submit"
                            class="px-2 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700 flex items-center"
                        >
                            <Save class="h-5 w-5 mr-2" />
                            {{ isEditing ? 'Update Profile' : 'Create Profile' }}
                        </button>
                    </div>
                </form>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                    Company Profile
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <span class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Description
                        </span>
                        <p class="text-gray-600 dark:text-gray-400 mt-1">
                            {{ company.description }}
                        </p>
                    </div>
                    <div>
                        <span class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Number
                        </span>
                        <p class="text-gray-600 dark:text-gray-400 mt-1">
                            {{ company.number }}
                        </p>
                    </div>
                    <div>
                        <span class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Email
                        </span>
                        <p class="text-gray-600 dark:text-gray-400 mt-1">
                            {{ company.email }}
                        </p>
                    </div>
                    <div>
                        <span class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Address
                        </span>
                        <p class="text-gray-600 dark:text-gray-400 mt-1">
                            {{ company.address }}
                        </p>
                    </div>
                    <div class="col-span-1 md:col-span-2">
                        <span class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Banner
                        </span>
                        <img
                            :src="`/storage/${company.banner}`"
                            alt="Banner"
                            class="h-50 w-full object-cover rounded-lg mt-1"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
