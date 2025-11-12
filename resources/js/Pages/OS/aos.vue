<template>
    <Download
        :current-release="currentRelease"
        :releases="releases"
        :target-statuses="targetStatuses"
        :latest-versions="latestVersions"
        :os-type="osType"
    >

        <div>
            <div v-if="currentRelease === null"
                 class="w-full px-4 sm:px-6 py-16 sm:py-24 lg:px-8 text-center text-gray-500">
                Invalid Version or Not Registered Release
            </div>
            <div class="w-full">
                <div class="border-b px-4 sm:px-6 lg:px-8 py-8 sm:py-10 lg:py-12">
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold tracking-tight text-gray-900">
                        {{ __('Install Android') }}
                    </h2>
                    <div class="mt-6 sm:mt-8 lg:mt-10 flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-x-6">
                        <a :href="currentRelease['install_url']"
                           class="flex items-center justify-center rounded-lg bg-lime-600 py-3 px-5 text-base sm:text-sm font-semibold text-white shadow-lg hover:bg-lime-700 transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600 w-full sm:w-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-3 sm:mr-4 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                            {{ __('Download APK') }}
                        </a>
                        <a :href="route('application-install.releases',{
                            releaseId : currentRelease.id
                        })" class="text-center sm:text-left text-base sm:text-sm font-semibold leading-6 text-gray-900 hover:text-gray-700 transition-colors py-2 sm:py-0">
                            {{ __('Check for updated') }} <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </Download>
</template>
<script setup>
import {__} from "../../translate";

const props = defineProps({
    osType: String,
    currentRelease: Object,
    releases: Object,
    latestVersions: Object,
    targetStatuses: Array
})
import Download from "@application-install/Pages/Download.vue";
</script>
