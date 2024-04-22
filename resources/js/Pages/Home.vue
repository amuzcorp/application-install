<script setup>
import {__} from "@application-install/translate.js";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                Welcome, this is new Theme.<br />
                amuz/application-install
            </div>
        </div>
    </div>
</template>
