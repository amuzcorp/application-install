<template>
  <Download
    :current-release="currentRelease"
    :releases="releases"
    :target-statuses="targetStatuses"
    :latest-versions="latestVersions"
    :os-type="osType"
  >
    <div>
      <div
        v-if="currentRelease === null"
        class="w-full px-6 py-24 sm:py-32 lg:px-8 text-center text-gray-500"
      >
        Invalid Version or Not Registered Release
      </div>
      <div class="w-full">
        <div class="border-b px-8 py-12 lg:px-8">
          <h2
            class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"
          >
            {{ __("Install Android") }}
          </h2>
          <div class="mt-10 flex items-center gap-x-6">
            <a
              :href="currentRelease['install_url']"
              class="flex items-center rounded-md bg-lime-600 py-3 px-5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6 mr-4"
                fill="currentColor"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3"
                />
              </svg>
              {{ downloadLabel }}
            </a>
            <div class="flex gap-8">
              <a
                :href="
                  route('application-install.releases', {
                    releaseId: currentRelease.id,
                  })
                "
                class="text-sm font-semibold leading-6 text-gray-900"
              >
                {{ __("Check for updated") }} <span aria-hidden="true">→</span>
              </a>

              <a
                v-if="!IS_DEV"
                :href="`https://s3-an2-service-diagnostics-archive-prd.s3.ap-northeast-2.amazonaws.com/deployment/applications/android/${currentRelease['version_code']}/aos.apk')`"
                class="text-sm font-semibold leading-6 text-gray-900"
              >
                {{ __("Download APK") }} <span aria-hidden="true">→</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </Download>
</template>
<script setup>
import { __ } from "../../translate";

const props = defineProps({
  osType: String,
  currentRelease: Object,
  releases: Object,
  latestVersions: Object,
  targetStatuses: Array,
});
import Download from "@application-install/Pages/Download.vue";

const APP_DOMAIN = window?.Laravel?.APP_DOMAIN ?? "dev";
const IS_DEV = APP_DOMAIN.includes("dev");

const downloadLabel = IS_DEV ? __("Download APK") : __("Go to Playstore");
</script>
