<script setup>
import { ref, computed } from 'vue'
import { 
  Eye, 
  EyeOff, 
  Mail, 
  Lock, 
  User, 
  Loader2
} from 'lucide-vue-next'
import { router, Head } from "@inertiajs/vue3"

const activeTab = ref('login')
const isLoading = ref(false)
const showPassword = ref(false)
const showConfirmPassword = ref(false)
const rememberMe = ref(false)

const loginForm = ref({
  email: '',
  password: ''
})

const registerForm = ref({
  name: '',
  email: '',
  password: '',
  confirmPassword: ''
})

const loginErrors = ref({
  email: '',
  password: ''
})

const registerErrors = ref({
  name: '',
  email: '',
  password: '',
  confirmPassword: ''
})

const passwordStrength = computed(() => {
  const password = registerForm.value.password
  if (!password) return { score: 0, text: '' }
  
  let score = 0
  if (password.length >= 8) score++
  if (/[A-Z]/.test(password)) score++
  if (/[0-9]/.test(password)) score++
  if (/[^A-Za-z0-9]/.test(password)) score++

  const strengthText = [
    '',
    'Weak',
    'Fair',
    'Good',
    'Strong'
  ]

  return {
    score,
    text: strengthText[score]
  }
})

const passwordStrengthColor = computed(() => {
  const colors = [
    'bg-gray-200 dark:bg-gray-700',
    'bg-red-500',
    'bg-yellow-500',
    'bg-green-500',
    'bg-green-600'
  ]
  return colors[passwordStrength.value.score]
})

const validateLoginForm = () => {
  loginErrors.value = {
    email: '',
    password: ''
  }

  if (!loginForm.value.email) {
    loginErrors.value.email = 'Email is required'
  } else if (!/\S+@\S+\.\S+/.test(loginForm.value.email)) {
    loginErrors.value.email = 'Please enter a valid email'
  }

  if (!loginForm.value.password) {
    loginErrors.value.password = 'Password is required'
  }

  return !loginErrors.value.email && !loginErrors.value.password
}

const validateRegisterForm = () => {
  registerErrors.value = {
    name: '',
    email: '',
    password: '',
    confirmPassword: ''
  }

  if (!registerForm.value.name) {
    registerErrors.value.name = 'Name is required'
  }

  if (!registerForm.value.email) {
    registerErrors.value.email = 'Email is required'
  } else if (!/\S+@\S+\.\S+/.test(registerForm.value.email)) {
    registerErrors.value.email = 'Please enter a valid email'
  }

  if (!registerForm.value.password) {
    registerErrors.value.password = 'Password is required'
  } else if (registerForm.value.password.length < 8) {
    registerErrors.value.password = 'Password must be at least 8 characters'
  }

  if (!registerForm.value.confirmPassword) {
    registerErrors.value.confirmPassword = 'Please confirm your password'
  } else if (registerForm.value.password !== registerForm.value.confirmPassword) {
    registerErrors.value.confirmPassword = 'Passwords do not match'
  }

  return !Object.values(registerErrors.value).some(error => error)
}

const handleLogin = async () => {
  if (!validateLoginForm()) return

  isLoading.value = true
  try {
    router.post("/login", loginForm.value);
    console.log('Login successful!');
  } catch (error) {
    console.error('Login error:', error);
  } finally {
    isLoading.value = false;
  }
};

const handleRegister = async () => {
  if (!validateRegisterForm()) return

  isLoading.value = true
  try {
    router.post('/register', registerForm.value)
    console.log('Registration successful!')
  } catch (error) {
    console.error('Registration error:', error)
  } finally {
    isLoading.value = false
  }
}
</script>

<template>
  <Head title="Login" />
  <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto">
      <div class="text-center mb-8 mt-[3em]">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
          Welcome to Haventwined
        </h2>
      </div>

      <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-8">
        <div class="flex mb-8 border-b border-gray-200 dark:border-gray-700">
          <button
            v-for="tab in ['login', 'register']"
            :key="tab"
            @click="activeTab = tab"
            :class="[
              'flex-1 pb-4 text-sm font-medium transition-colors',
              activeTab === tab
                ? 'text-blue-600 dark:text-blue-400 border-b-2 border-blue-600 dark:border-blue-400'
                : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300'
            ]"
          >
            {{ tab.charAt(0).toUpperCase() + tab.slice(1) }}
          </button>
        </div>

        <form v-if="activeTab === 'login'" @submit.prevent="handleLogin">
          <div class="space-y-6">
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Email
              </label>
              <div class="relative">
                <Mail class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400" />
                <input
                  v-model="loginForm.email"
                  type="email"
                  class="pl-10 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                  :class="{ 'border-red-500 dark:border-red-500': loginErrors.email }"
                  placeholder="email@gmail.com"
                />
              </div>
              <p v-if="loginErrors.email" class="mt-1 text-sm text-red-500">
                {{ loginErrors.email }}
              </p>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Password
              </label>
              <div class="relative">
                <Lock class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400" />
                <input
                  v-model="loginForm.password"
                  :type="showPassword ? 'text' : 'password'"
                  class="pl-10 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                  :class="{ 'border-red-500 dark:border-red-500': loginErrors.password }"
                  placeholder="••••••••"
                />
                <button
                  type="button"
                  @click="showPassword = !showPassword"
                  class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"
                >
                  <Eye v-if="!showPassword" class="h-5 w-5" />
                  <EyeOff v-else class="h-5 w-5" />
                </button>
              </div>
              <p v-if="loginErrors.password" class="mt-1 text-sm text-red-500">
                {{ loginErrors.password }}
              </p>
            </div>

            <div class="flex items-center justify-between">
              <label class="flex items-center">
                <input
                  v-model="rememberMe"
                  type="checkbox"
                  class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700"
                />
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
              </label>
              <a href="#" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">
                Forgot password?
              </a>
            </div>

            <button
              type="submit"
              :disabled="isLoading"
              class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
            >
              <Loader2 v-if="isLoading" class="animate-spin -ml-1 mr-2 h-5 w-5" />
              {{ isLoading ? 'Signing in...' : 'Sign in' }}
            </button>
          </div>
        </form>

        <form v-else @submit.prevent="handleRegister">
          <div class="space-y-6">
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Full Name
              </label>
              <div class="relative">
                <User class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400" />
                <input
                  v-model="registerForm.name"
                  type="text"
                  class="pl-10 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                  :class="{ 'border-red-500 dark:border-red-500': registerErrors.name }"
                  placeholder="Your full name"
                />
              </div>
              <p v-if="registerErrors.name" class="mt-1 text-sm text-red-500">
                {{ registerErrors.name }}
              </p>
            </div>

            <!-- Email -->
            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Email
              </label>
              <div class="relative">
                <Mail class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400" />
                <input
                  v-model="registerForm.email"
                  type="email"
                  class="pl-10 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                  :class="{ 'border-red-500 dark:border-red-500': registerErrors.email }"
                  placeholder="email@gmail.com"
                />
              </div>
              <p v-if="registerErrors.email" class="mt-1 text-sm text-red-500">
                {{ registerErrors.email }}
              </p>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Password
              </label>
              <div class="relative">
                <Lock class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400" />
                <input
                  v-model="registerForm.password"
                  :type="showPassword ? 'text' : 'password'"
                  class="pl-10 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                  :class="{ 'border-red-500 dark:border-red-500': registerErrors.password }"
                  placeholder="••••••••"
                />
                <button
                  type="button"
                  @click="showPassword = !showPassword"
                  class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"
                >
                  <Eye v-if="!showPassword" class="h-5 w-5" />
                  <EyeOff v-else class="h-5 w-5" />
                </button>
              </div>
              <p v-if="registerErrors.password" class="mt-1 text-sm text-red-500">
                {{ registerErrors.password }}
              </p>

              <div v-if="registerForm.password" class="mt-2">
                <div class="h-2 rounded-full bg-gray-200 dark:bg-gray-700">
                  <div
                    class="h-full rounded-full transition-all duration-300"
                    :class="passwordStrengthColor"
                    :style="{ width: `${(passwordStrength.score / 4) * 100}%` }"
                  ></div>
                </div>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                  Password strength: {{ passwordStrength.text }}
                </p>
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Confirm Password
              </label>
              <div class="relative">
                <Lock class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400" />
                <input
                  v-model="registerForm.confirmPassword"
                  :type="showConfirmPassword ? 'text' : 'password'"
                  class="pl-10 w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                  :class="{ 'border-red-500 dark:border-red-500': registerErrors.confirmPassword }"
                  placeholder="••••••••"
                />
                <button
                  type="button"
                  @click="showConfirmPassword = !showConfirmPassword"
                  class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"
                >
                  <Eye v-if="!showConfirmPassword" class="h-5 w-5" />
                  <EyeOff v-else class="h-5 w-5" />
                </button>
              </div>
              <p v-if="registerErrors.confirmPassword" class="mt-1 text-sm text-red-500">
                {{ registerErrors.confirmPassword }}
              </p>
            </div>

            <button
              type="submit"
              :disabled="isLoading"
              class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
            >
              <Loader2 v-if="isLoading" class="animate-spin -ml-1 mr-2 h-5 w-5" />
              {{ isLoading ? 'Creating account...' : 'Create account' }}
            </button>
          </div>
        </form>
      </div>

      <p class="mt-4 text-center text-sm text-gray-600 dark:text-gray-400">
        By continuing, you agree to our
        <a href="/terms" class="text-blue-600 dark:text-blue-400 hover:underline">Terms of Service</a>
        and
        <a href="/policy" class="text-blue-600 dark:text-blue-400 hover:underline">Privacy Policy</a>
      </p>
    </div>
  </div>
</template>
