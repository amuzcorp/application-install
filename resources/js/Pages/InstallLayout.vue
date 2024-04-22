<template>
    <div class="bg-white">
        <!-- Header -->
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a :href="$page.props.frontConfig['home_url']" class="-m-1.5 p-1.5">
                        <span class="sr-only">{{ $page.props.frontConfig['company_name'] }}</span>
                        <div class="h-8 max-w-52" v-html="$page.props.frontConfig['logo_src']" />
                    </a>
                </div>
                <div class="flex gap-x-12">
                    <a v-for="item in navigation" :key="item.name" :href="item.href" class="text-sm font-semibold leading-6 text-gray-900">{{ item.name }}</a>
                </div>
            </nav>
        </header>

        <main>
            <slot />
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900" aria-labelledby="footer-heading">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div class="mx-auto max-w-7xl px-6 pb-8 pt-8 sm:pt-12 lg:px-8 lg:pt-16">
                <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                    <div class="h-12 max-w-12" v-html="$page.props.frontConfig['footer_symbol']" />
                </div>
                <div class="mt-8 border-t border-white/10 pt-8 md:flex md:items-center md:justify-between">
                    <div class="flex space-x-6 md:order-2">
                        <a v-for="item in footerNavigation" :key="item.name" :href="item.href" class="text-gray-500 hover:text-gray-400">
                            <span class="sr-only">{{ item.name }}</span>
                            <component :is="item.icon" class="h-6 w-6" aria-hidden="true" />
                        </a>
                    </div>
                    <p class="mt-8 text-xs leading-5 text-gray-400 md:order-1 md:mt-0">&copy; 2024 Amuz CO.,LTD. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</template>

<script setup>
import {defineComponent, h} from 'vue'
import {__} from "../translate";

const navigation = [
    { name: 'Install Home', href: route('application-install.index') },
    { name: 'Release Notes', href: route('application-install.releases') },
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
