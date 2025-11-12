<template>
    <div class="bg-white">
        <!-- Header -->
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-4 sm:p-6 lg:px-8" aria-label="Global">
                <div class="flex flex-1 lg:flex-1">
                    <a :href="$page.props.frontConfig['home_url']" class="-m-1.5 p-1.5">
                        <span class="sr-only">{{ $page.props.frontConfig['company_name'] }}</span>
                        <div class="h-6 sm:h-8 max-w-40 sm:max-w-52" v-html="$page.props.frontConfig['logo_src']" />
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex gap-x-6 lg:gap-x-8 xl:gap-x-12">
                    <a v-for="item in navigation" :key="item.name" :href="item.href" class="text-sm font-semibold leading-6 text-gray-900 hover:text-gray-700 transition-colors whitespace-nowrap">{{ item.name }}</a>
                </div>

                <div class="flex items-center gap-x-3 sm:gap-x-4">
                    <!-- Language Selector (always visible) -->
                    <LanguageSelector />
                    <!-- Mobile menu button -->
                    <button
                        type="button"
                        class="md:hidden -m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700 hover:bg-gray-100 transition-colors"
                        @click="mobileMenuOpen = true"
                    >
                        <span class="sr-only">메뉴 열기</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>

                </div>
            </nav>

            <!-- Mobile menu (off-canvas) -->
            <Transition
                enter-active-class="transition-opacity duration-300 ease-out"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-active-class="transition-opacity duration-200 ease-in"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <div v-if="mobileMenuOpen" class="fixed inset-0 z-50 md:hidden">
                    <!-- Backdrop -->
                    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" @click="mobileMenuOpen = false" />

                    <!-- Off-canvas menu -->
                    <Transition
                        enter-active-class="transition-transform duration-300 ease-out"
                        enter-from-class="translate-x-full"
                        enter-to-class="translate-x-0"
                        leave-active-class="transition-transform duration-200 ease-in"
                        leave-from-class="translate-x-0"
                        leave-to-class="translate-x-full"
                    >
                        <div v-if="mobileMenuOpen" class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                            <div class="flex items-center justify-between">
                                <a :href="$page.props.frontConfig['home_url']" class="-m-1.5 p-1.5">
                                    <span class="sr-only">{{ $page.props.frontConfig['company_name'] }}</span>
                                    <div class="h-6 sm:h-8 max-w-40 sm:max-w-52" v-html="$page.props.frontConfig['logo_src']" />
                                </a>
                                <button
                                    type="button"
                                    class="-m-2.5 rounded-md p-2.5 text-gray-700 hover:bg-gray-100 transition-colors"
                                    @click="mobileMenuOpen = false"
                                >
                                    <span class="sr-only">메뉴 닫기</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-6 flow-root">
                                <div class="space-y-2 py-6">
                                    <a
                                        v-for="item in navigation"
                                        :key="item.name"
                                        :href="item.href"
                                        class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50 transition-colors"
                                        @click="mobileMenuOpen = false"
                                    >
                                        {{ item.name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </Transition>
                </div>
            </Transition>
        </header>

        <main>
            <slot />
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900" aria-labelledby="footer-heading">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pb-6 sm:pb-8 pt-6 sm:pt-8 lg:pt-12">
                <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                    <div class="h-10 sm:h-12 max-w-10 sm:max-w-12" v-html="$page.props.frontConfig['footer_symbol']" />
                </div>
                <div class="mt-6 sm:mt-8 border-t border-white/10 pt-6 sm:pt-8 md:flex md:items-center md:justify-between">
                    <div class="flex justify-center md:justify-start space-x-6 md:order-2">
                        <a v-for="item in footerNavigation" :key="item.name" :href="item.href" class="text-gray-500 hover:text-gray-400 transition-colors">
                            <span class="sr-only">{{ item.name }}</span>
                            <component :is="item.icon" class="h-6 w-6" aria-hidden="true" />
                        </a>
                    </div>
                    <p class="mt-6 sm:mt-8 text-xs sm:text-sm leading-5 text-gray-400 text-center md:text-left md:order-1 md:mt-0">&copy; 2024 Amuz CO.,LTD. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</template>

<script setup>
import LanguageSelector from './LanguageSelector.vue';
import {defineComponent, h, ref} from 'vue'
import {__} from "../translate";

const mobileMenuOpen = ref(false)

const navigation = [
    { name: __('Install Home'), href: route('application-install.index') },
    { name: __('Release Notes'), href: route('application-install.releases') },
]

const footerNavigation = [
    {
        name: 'AMUZ',
        href: 'https://amuz.co.kr',
        icon: defineComponent({
            render: () =>
                h('svg', { fill: 'currentColor', viewBox: '0 0 68 68'}, [
                    h('g',{
                        transform: 'translate(0,68) scale(0.1,-0.1)'
                    },[
                        h('path', {
                            d: 'M405 668 c-9 -29 -25 -94 -25 -104 0 -7 12 -15 28 -19 15 -3 42 -18 60 -32 l33 -25 44 37 c25 20 45 40 45 45 0 31 -176 124 -185 98z',
                        }),
                        h('path', {
                            d: 'M120 640 c-27 -27 -25 -66 5 -95 30 -31 65 -32 93 -2 44 46 14 117 -48 117 -17 0 -39 -9 -50 -20z',
                        }),
                        h('path', {
                            d: 'M10 315 c0 -99 80 -214 185 -266 61 -30 69 -31 157 -27 79 3 101 8 146 33 l52 28 23 -21 c12 -12 39 -28 60 -37 l37 -15 0 154 c0 173 -5 186 -65 186 -37 0 -58 -21 -70 -71 -10 -40 -60 -95 -108 -118 -116 -56 -255 12 -288 141 l-13 48 -58 0 -58 0 0 -35z',
                        }),
                    ])
                ]),
        }),
    }
]
</script>
