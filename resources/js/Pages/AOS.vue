<template>
    <AppLayout>
        <div class="bg-stone-500">
            <div class="px-6 py-24 sm:px-6 sm:py-32 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                        Install Application for Android
                    </h2>
                    <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-stone-200">
                        {{__("From washing machines, refrigerators to air conditioners.")}}
                        {{__("The one application for service engineers.")}}
                    </p>
                </div>
            </div>
        </div>
        <div class="mx-auto max-w-2xl text-center -mt-24 bg-white rounded-xl p-8">
            준비중
        </div>
    </AppLayout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {__} from "@/translate.js";
</script>
