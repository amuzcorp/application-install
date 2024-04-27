<template>
    <InstallLayout>
        <div class="bg-gray-100 pb-12">
            <div class="pb-48" :class="$page.props.frontConfig['layout_class']">
                <div class="pt-32 mx-auto w-full max-w-6xl flex justify-between">
                    <div class="flex items-center gap-x-6">
                        <div v-if="currentRelease['os_type'] === 'ios'">
                            <div class="text-gray-700 w-16 h-16">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 50 50">
                                    <path d="M 44.527344 34.75 C 43.449219 37.144531 42.929688 38.214844 41.542969 40.328125 C 39.601563 43.28125 36.863281 46.96875 33.480469 46.992188 C 30.46875 47.019531 29.691406 45.027344 25.601563 45.0625 C 21.515625 45.082031 20.664063 47.03125 17.648438 47 C 14.261719 46.96875 11.671875 43.648438 9.730469 40.699219 C 4.300781 32.429688 3.726563 22.734375 7.082031 17.578125 C 9.457031 13.921875 13.210938 11.773438 16.738281 11.773438 C 20.332031 11.773438 22.589844 13.746094 25.558594 13.746094 C 28.441406 13.746094 30.195313 11.769531 34.351563 11.769531 C 37.492188 11.769531 40.8125 13.480469 43.1875 16.433594 C 35.421875 20.691406 36.683594 31.78125 44.527344 34.75 Z M 31.195313 8.46875 C 32.707031 6.527344 33.855469 3.789063 33.4375 1 C 30.972656 1.167969 28.089844 2.742188 26.40625 4.78125 C 24.878906 6.640625 23.613281 9.398438 24.105469 12.066406 C 26.796875 12.152344 29.582031 10.546875 31.195313 8.46875 Z"></path>
                                </svg>
                            </div>
                        </div>
                        <div v-if="currentRelease['os_type'] === 'aos'">
                            <div class="text-lime-600 w-16 h-16">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 50 50">
                                    <path d="M 16.28125 0.03125 C 16.152344 0.0546875 16.019531 0.078125 15.90625 0.15625 C 15.449219 0.464844 15.347656 1.105469 15.65625 1.5625 L 17.8125 4.78125 C 14.480469 6.546875 11.996094 9.480469 11.1875 13 L 38.8125 13 C 38.003906 9.480469 35.519531 6.546875 32.1875 4.78125 L 34.34375 1.5625 C 34.652344 1.105469 34.550781 0.464844 34.09375 0.15625 C 33.632813 -0.152344 32.996094 -0.0195313 32.6875 0.4375 L 30.3125 3.9375 C 28.664063 3.335938 26.875 3 25 3 C 23.125 3 21.335938 3.335938 19.6875 3.9375 L 17.3125 0.4375 C 17.082031 0.09375 16.664063 -0.0429688 16.28125 0.03125 Z M 19.5 8 C 20.328125 8 21 8.671875 21 9.5 C 21 10.332031 20.328125 11 19.5 11 C 18.667969 11 18 10.332031 18 9.5 C 18 8.671875 18.667969 8 19.5 8 Z M 30.5 8 C 31.332031 8 32 8.671875 32 9.5 C 32 10.332031 31.332031 11 30.5 11 C 29.671875 11 29 10.332031 29 9.5 C 29 8.671875 29.671875 8 30.5 8 Z M 8 15 C 6.34375 15 5 16.34375 5 18 L 5 32 C 5 33.65625 6.34375 35 8 35 C 8.351563 35 8.6875 34.925781 9 34.8125 L 9 15.1875 C 8.6875 15.074219 8.351563 15 8 15 Z M 11 15 L 11 37 C 11 38.652344 12.347656 40 14 40 L 36 40 C 37.652344 40 39 38.652344 39 37 L 39 15 Z M 42 15 C 41.648438 15 41.3125 15.074219 41 15.1875 L 41 34.8125 C 41.3125 34.921875 41.648438 35 42 35 C 43.65625 35 45 33.65625 45 32 L 45 18 C 45 16.34375 43.65625 15 42 15 Z M 15 42 L 15 46 C 15 48.207031 16.792969 50 19 50 C 21.207031 50 23 48.207031 23 46 L 23 42 Z M 27 42 L 27 46 C 27 48.207031 28.792969 50 31 50 C 33.207031 50 35 48.207031 35 46 L 35 42 Z"></path>
                                </svg>
                            </div>
                        </div>
                        <template v-if="currentRelease !== null">
                            <h1 class="text-gray-700 text-6xl font-bold">
                                {{ currentRelease['version_code'] }}
                            </h1>
                            <small class="text-gray-600 font-normal text-xl">
                                +{{ currentRelease['build_number'] }}
                            </small>
                        </template>
                        <template v-else>
                            Invalid Version
                        </template>
                    </div>
                    <div v-if="currentRelease !== null">
                        <div class="text-gray-600 text-right">
                            {{ currentRelease['published'] }}
                            <p class="truncate"> {{ currentRelease['os_type'] }} {{ currentRelease['min_os_version'] }} or more </p>
                        </div>
                    </div>
                </div>

                <div class="mx-auto py-4 w-full max-w-6xl flex justify-end">
                    <div class="isolate rounded-md shadow-sm">
                        <button @click="updateActiveStatuses(status)" v-for="(cssClass,status, idx) in statuses" type="button"
                                :class="[
                                        idx === 0 ? 'rounded-l-md' : '',
                                        (Object.keys(statuses).length - 1) === idx ? 'rounded-r-md' : '',
                                        activeStatuses.indexOf(status) !== -1 ? 'bg-gray-700 text-white' : 'bg-white ring-1'
                                    ]"
                                class="relative -ml-px flex-1 items-center bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-inset ring-gray-200  focus:z-10"
                        >
                            {{ status }}
                        </button>
                    </div>
                </div>
            </div>
            <div class="-mt-48 mx-auto bg-white rounded-xl shadow-lg w-full max-w-6xl grow lg:flex overflow-hidden">
                <div class="flex-1">
                    <slot />
                </div>

                <div class="shrink-0 border-t border-gray-200 lg:w-96 lg:border-l lg:border-t-0">
                    <ul role="list" class="divide-y divide-gray-100">
                        <li v-for="(release,idx) in releaseList" :key="release.id"
                            class="px-4 sm:px-6 lg:pr-8 xl:pr-6"
                            :class="release.id === currentRelease.id ? 'bg-gray-200' : ''"
                        >
                            <a :href="route('application-install.' + osType,{
                                releaseId : release.id
                            })" class="flex items-center justify-between gap-x-6 py-5">
                                <div v-if="release['os_type'] === 'ios'" class="bg-gray-600 p-4 rounded-xl">
                                    <div class="text-white w-6 h-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 50 50">
                                            <path d="M 44.527344 34.75 C 43.449219 37.144531 42.929688 38.214844 41.542969 40.328125 C 39.601563 43.28125 36.863281 46.96875 33.480469 46.992188 C 30.46875 47.019531 29.691406 45.027344 25.601563 45.0625 C 21.515625 45.082031 20.664063 47.03125 17.648438 47 C 14.261719 46.96875 11.671875 43.648438 9.730469 40.699219 C 4.300781 32.429688 3.726563 22.734375 7.082031 17.578125 C 9.457031 13.921875 13.210938 11.773438 16.738281 11.773438 C 20.332031 11.773438 22.589844 13.746094 25.558594 13.746094 C 28.441406 13.746094 30.195313 11.769531 34.351563 11.769531 C 37.492188 11.769531 40.8125 13.480469 43.1875 16.433594 C 35.421875 20.691406 36.683594 31.78125 44.527344 34.75 Z M 31.195313 8.46875 C 32.707031 6.527344 33.855469 3.789063 33.4375 1 C 30.972656 1.167969 28.089844 2.742188 26.40625 4.78125 C 24.878906 6.640625 23.613281 9.398438 24.105469 12.066406 C 26.796875 12.152344 29.582031 10.546875 31.195313 8.46875 Z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div v-if="release['os_type'] === 'aos'" class="bg-lime-600 p-4 rounded-xl">
                                    <div class="text-white w-6 h-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 50 50">
                                            <path d="M 16.28125 0.03125 C 16.152344 0.0546875 16.019531 0.078125 15.90625 0.15625 C 15.449219 0.464844 15.347656 1.105469 15.65625 1.5625 L 17.8125 4.78125 C 14.480469 6.546875 11.996094 9.480469 11.1875 13 L 38.8125 13 C 38.003906 9.480469 35.519531 6.546875 32.1875 4.78125 L 34.34375 1.5625 C 34.652344 1.105469 34.550781 0.464844 34.09375 0.15625 C 33.632813 -0.152344 32.996094 -0.0195313 32.6875 0.4375 L 30.3125 3.9375 C 28.664063 3.335938 26.875 3 25 3 C 23.125 3 21.335938 3.335938 19.6875 3.9375 L 17.3125 0.4375 C 17.082031 0.09375 16.664063 -0.0429688 16.28125 0.03125 Z M 19.5 8 C 20.328125 8 21 8.671875 21 9.5 C 21 10.332031 20.328125 11 19.5 11 C 18.667969 11 18 10.332031 18 9.5 C 18 8.671875 18.667969 8 19.5 8 Z M 30.5 8 C 31.332031 8 32 8.671875 32 9.5 C 32 10.332031 31.332031 11 30.5 11 C 29.671875 11 29 10.332031 29 9.5 C 29 8.671875 29.671875 8 30.5 8 Z M 8 15 C 6.34375 15 5 16.34375 5 18 L 5 32 C 5 33.65625 6.34375 35 8 35 C 8.351563 35 8.6875 34.925781 9 34.8125 L 9 15.1875 C 8.6875 15.074219 8.351563 15 8 15 Z M 11 15 L 11 37 C 11 38.652344 12.347656 40 14 40 L 36 40 C 37.652344 40 39 38.652344 39 37 L 39 15 Z M 42 15 C 41.648438 15 41.3125 15.074219 41 15.1875 L 41 34.8125 C 41.3125 34.921875 41.648438 35 42 35 C 43.65625 35 45 33.65625 45 32 L 45 18 C 45 16.34375 43.65625 15 42 15 Z M 15 42 L 15 46 C 15 48.207031 16.792969 50 19 50 C 21.207031 50 23 48.207031 23 46 L 23 42 Z M 27 42 L 27 46 C 27 48.207031 28.792969 50 31 50 C 33.207031 50 35 48.207031 35 46 L 35 42 Z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="min-w-0 w-full">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-end">
                                            <p class="font-semibold text-lg leading-6 text-gray-900">
                                                {{ release['version_code'] }}
                                            </p>
                                            <span class="font-normal text-sm">(+{{ release['build_number'] }})</span>
                                        </div>
                                        <p v-if="latestVersions[release['os_type']]['version_code'] === release['version_code']"
                                           class="bg-gray-700 text-white rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset">
                                            LTS
                                        </p>
                                        <p v-else :class="[statuses[release.status], 'rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset']">{{ release.status }}</p>
                                    </div>
                                    <div class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                                        <p class="truncate"> {{ release['os_type'] }} {{ release['min_os_version'] }} or more </p>
                                        <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 fill-current">
                                            <circle cx="1" cy="1" r="1" />
                                        </svg>
                                        <p class="whitespace-nowrap">
                                            {{ __('Published') }} : <time :datetime="release['publish_at']">{{ release['published'] }}</time>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div @click="loadMore" v-if="currentPage < lastPage" class="pt-4 border-t text-center text-sm text-indigo-700">
                        Load More...
                    </div>
                </div>
            </div>
        </div>
    </InstallLayout>
</template>
<script setup>
import InstallLayout from "@application-install/Pages/InstallLayout.vue";
import {__} from "@application-install/translate.js";
import {onMounted, ref} from "vue";
import {router} from "@inertiajs/vue3";
const props = defineProps({
    osType : String,
    currentRelease : Object,
    releases : Object,
    latestVersions : Object,
    targetStatuses : Array
})
const lastPage = ref(0)
const currentPage = ref(0)
const releaseList = ref([])
const activeStatuses = ref([...props.targetStatuses])
const statuses = {
    stable : 'text-green-700 bg-green-50 ring-green-600/20',
    beta : 'text-yellow-800 bg-yellow-50 ring-yellow-600/20',
    dev : 'text-gray-600 bg-gray-50 ring-gray-500/10',
    arch : 'text-gray-600 bg-gray-50 ring-gray-500/10',
}
const updateActiveStatuses = ((status) => {
    let idx = activeStatuses.value.indexOf(status);
    if(idx === -1){
        activeStatuses.value.push(status)
    }else{
        activeStatuses.value.splice(idx,1)
    }
    releaseList.value = [];
    router.reload({
        only: ['releases'],
        data : {
            'active_statuses' : activeStatuses.value.join(","),
            'page' : 1
        },
        onFinish: () => {
            activeStatuses.value = props.targetStatuses
            releaseList.value = props.releases.data
            currentPage.value = props.releases['current_page']
            lastPage.value = props.releases['last_page']
        }
    })
})
const loadMore = (() => {
    router.reload({
        only: ['releases','targetStatuses'],
        data : {
            'active_statuses' : activeStatuses.value.join(","),
            'page' : currentPage.value + 1
        },
        onFinish: () => {
            arrangeData()
        }
    })
})
const arrangeData = (() => {
    console.log(props.targetStatuses)
    if (props.releases['current_page'] > currentPage.value) {
        activeStatuses.value = props.targetStatuses
        releaseList.value = [...releaseList.value, ...props.releases.data]
        currentPage.value = props.releases['current_page']
        lastPage.value = props.releases['last_page']
    }
})
onMounted(() => {
    arrangeData()
})
</script>
