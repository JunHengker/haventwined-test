<script setup>
import { ref } from 'vue'
import { Menu, X, Phone, Mail } from 'lucide-vue-next'

const isMenuOpen = ref(false)
const currentSection = ref('home')

const navigation = [
    { name: 'Home', href: '#home' },
    { name: 'Events', href: '#event' },
    { name: 'About', href: '#about' },
]

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value
}

const setCurrentSection = (section) => {
    currentSection.value = section
    isMenuOpen.value = false
}
</script>

<template>
    <div class="min-h-screen bg-white dark:bg-gray-900">
        <nav class="fixed w-full bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm z-50 border-b border-gray-200 dark:border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-18">
                    <div class="flex items-center">
                        <a href="/">
                            <img src="../../../public/assets/logo-haven.png" alt="HavenTwined" class="w-[12em]" />
                        </a>
                    </div>

                    <div class="hidden md:flex items-center space-x-8">
                        <template v-for="item in navigation" :key="item.name">
                            <a
                                :href="item.href"
                                :class="[
                                    currentSection === item.name.toLowerCase()
                                        ? 'text-emerald-600 dark:text-emerald-400'
                                        : 'text-gray-700 dark:text-gray-300 hover:text-emerald-600 dark:hover:text-emerald-400',
                                    'px-3 py-2 text-sm font-medium transition-colors'
                                ]"
                                @click="setCurrentSection(item.name.toLowerCase())"
                            >
                                {{ item.name }}
                            </a>
                        </template>
                    </div>

                    <div class="flex items-center md:hidden">
                        <button
                            @click="toggleMenu"
                            class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white"
                        >
                            <Menu v-if="!isMenuOpen" class="h-6 w-6" />
                            <X v-else class="h-6 w-6" />
                        </button>
                    </div>
                </div>
            </div>

            <div
                v-show="isMenuOpen"
                class="md:hidden bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800"
            >
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <template v-for="item in navigation" :key="item.name">
                        <a
                            :href="item.href"
                            :class="[
                                currentSection === item.name.toLowerCase()
                                    ? 'text-emerald-600 dark:text-emerald-400'
                                    : 'text-gray-700 dark:text-gray-300',
                                'block px-3 py-2 text-base font-medium hover:bg-gray-50 dark:hover:bg-gray-800 rounded-md'
                            ]"
                            @click="setCurrentSection(item.name.toLowerCase())"
                        >
                            {{ item.name }}
                        </a>
                    </template>
                </div>
            </div>
        </nav>
        <main>
            <slot />
        </main>
        <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800">
            <div class="max-w-7xl mx-auto pt-8 pb-4 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <a href="/">
                            <img src="../../../public/assets/logo-haven.png" class="w-[14em] my-2" />
                        </a>

                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Contact Us</h2>
                        <ul class="mt-4 space-y-2 text-gray-600 dark:text-white">
                            <li>
                                <Phone class="w-8 h-8 inline-block mr-2 text-green-400" />
                                +62 822-9944-9708
                            </li>
                            <li>
                                <Mail class="w-8 h-8 inline-block mr-2 text-yellow-400" />
                                support@haventwined.com
                            </li>
                        </ul>
                    </div>

                    <div class="text-right">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Events</h2>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#event" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Jelajahi - Events</a></li>
                        </ul>
                    </div>

                    <div class="text-right">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Quick Links</h2>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">FAQ</a></li>
                            <li><a href="/policy" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Privacy Policy</a></li>
                            <li><a href="/terms" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="mt-2 text-center text-gray-600 dark:text-gray-400">
                    <p>&copy; {{ new Date().getFullYear() }} Haventwined. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</template>
