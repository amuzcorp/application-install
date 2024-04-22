<template>
    <InstallLayout>
        <!-- Hero section -->
        <div class="relative isolate max-h-screen overflow-hidden">
            <svg class="absolute inset-0 -z-10 h-full w-full stroke-gray-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]" aria-hidden="true">
                <defs>
                    <pattern id="83fd4e5a-9d52-42fc-97b6-718e5d7ee527" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                        <path d="M100 200V.5M.5 .5H200" fill="none" />
                    </pattern>
                </defs>
                <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
                    <path d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z" stroke-width="0" />
                </svg>
                <rect width="100%" height="100%" stroke-width="0" fill="url(#83fd4e5a-9d52-42fc-97b6-718e5d7ee527)" />
            </svg>
            <div class="mx-auto max-w-7xl px-6 py-12 sm:py-16 lg:flex lg:gap-x-10 lg:px-8 lg:py-32">
                <div class="mx-auto max-w-2xl lg:mx-0 lg:flex-auto pt-8 sm:pt-16 lg:pt-20">
                    <h1 class="mt-10 max-w-lg text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                        {{ __($page.props.frontConfig['app_name']) }}
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">
                        {{ __($page.props.frontConfig['app_description']) }}
                    </p>
                    <div class="mt-10 flex items-center gap-x-6">
                        <a :href="route('application-install.ios')" class="rounded-md bg-rose-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-rose-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-rose-600">
                            {{ __('Install iOS') }}
                        </a>
                        <a :href="route('application-install.android')" class="rounded-md bg-rose-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-rose-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-rose-600">
                            {{ __('Install Android') }}
                        </a>
                        <a :href="route('application-install.releases')" class="text-sm font-semibold leading-6 text-gray-900">
                            {{ __('Check for updated') }}
                            <span aria-hidden="true">→</span></a>
                    </div>
                </div>
                <div class="mt-16 sm:mt-24 lg:mt-0 lg:flex-shrink-0 lg:flex-grow">
                    <svg viewBox="0 0 366 729" role="img" class="mx-auto w-[22.875rem] max-w-full drop-shadow-xl">
                        <title>App screenshot</title>
                        <defs>
                            <clipPath id="2ade4387-9c63-4fc4-b754-10e687a0d332">
                                <rect width="316" height="684" rx="36" />
                            </clipPath>
                        </defs>
                        <path fill="#4B5563" d="M363.315 64.213C363.315 22.99 341.312 1 300.092 1H66.751C25.53 1 3.528 22.99 3.528 64.213v44.68l-.857.143A2 2 0 0 0 1 111.009v24.611a2 2 0 0 0 1.671 1.973l.95.158a2.26 2.26 0 0 1-.093.236v26.173c.212.1.398.296.541.643l-1.398.233A2 2 0 0 0 1 167.009v47.611a2 2 0 0 0 1.671 1.973l1.368.228c-.139.319-.314.533-.511.653v16.637c.221.104.414.313.56.689l-1.417.236A2 2 0 0 0 1 237.009v47.611a2 2 0 0 0 1.671 1.973l1.347.225c-.135.294-.302.493-.49.607v377.681c0 41.213 22 63.208 63.223 63.208h95.074c.947-.504 2.717-.843 4.745-.843l.141.001h.194l.086-.001 33.704.005c1.849.043 3.442.37 4.323.838h95.074c41.222 0 63.223-21.999 63.223-63.212v-394.63c-.259-.275-.48-.796-.63-1.47l-.011-.133 1.655-.276A2 2 0 0 0 366 266.62v-77.611a2 2 0 0 0-1.671-1.973l-1.712-.285c.148-.839.396-1.491.698-1.811V64.213Z" />
                        <path fill="#343E4E" d="M16 59c0-23.748 19.252-43 43-43h246c23.748 0 43 19.252 43 43v615c0 23.196-18.804 42-42 42H58c-23.196 0-42-18.804-42-42V59Z" />
                        <foreignObject width="316" height="684" transform="translate(24 24)" clip-path="url(#2ade4387-9c63-4fc4-b754-10e687a0d332)">
                            <img :src="$page.props.frontConfig['app_screenshot']" alt="" />
                        </foreignObject>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Feature section -->
        <div id="#features" class="mx-auto max-w-7xl px-6 lg:px-8 bg-gray-50 py-16 md:py-24 lg:py-32">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-base font-semibold leading-7 text-rose-600">
                    {{ __('Features') }}
                </h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    {{ __($page.props.frontConfig['feature_title']) }}
                </p>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    {{ __($page.props.frontConfig['feature_description']) }}
                </p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                    <div v-for="feature in features" :key="feature.name" class="relative pl-16">
                        <dt class="text-base font-semibold leading-7 text-gray-900">
                            <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-rose-600">
                                <component :is="feature.icon" class="h-6 w-6 text-white" aria-hidden="true" />
                            </div>
                            {{ feature.name }}
                        </dt>
                        <dd class="mt-2 text-base leading-7 text-gray-600">{{ feature.description }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </InstallLayout>
</template>
<script setup>
import {ArrowPathIcon, CloudArrowUpIcon, FingerPrintIcon, LockClosedIcon} from "@heroicons/vue/20/solid";
import InstallLayout from "@application-install/Pages/InstallLayout.vue";
import {__} from "../translate";

const features = [
    {
        name: 'Push to deploy',
        description:
            'Morbi viverra dui mi arcu sed. Tellus semper adipiscing suspendisse semper morbi. Odio urna massa nunc massa.',
        icon: CloudArrowUpIcon,
    },
    {
        name: 'SSL certificates',
        description:
            'Sit quis amet rutrum tellus ullamcorper ultricies libero dolor eget. Sem sodales gravida quam turpis enim lacus amet.',
        icon: LockClosedIcon,
    },
    {
        name: 'Simple queues',
        description:
            'Quisque est vel vulputate cursus. Risus proin diam nunc commodo. Lobortis auctor congue commodo diam neque.',
        icon: ArrowPathIcon,
    },
    {
        name: 'Advanced security',
        description:
            'Arcu egestas dolor vel iaculis in ipsum mauris. Tincidunt mattis aliquet hac quis. Id hac maecenas ac donec pharetra eget.',
        icon: FingerPrintIcon,
    },
]
</script>
