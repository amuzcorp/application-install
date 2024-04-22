<template>
    <InstallLayout>
        <div class="bg-gray-100 pt-24 pb-12">
            <div class="mx-auto bg-white rounded-xl shadow-lg w-full max-w-6xl grow lg:flex xl:px-2">
                <!-- Left sidebar & main wrapper -->
                <div class="flex-1">
                    <div class="border-b border-gray-200 px-4 py-6 sm:px-6 lg:pl-8 shrink-0">
                        App icon
                        <br />
                        IOS / Android
                    </div>

                    <div class="px-4 py-6 sm:px-6 lg:pl-8 xl:flex-1 xl:pl-6">
                        Release Content
                    </div>
                </div>

                <div class="shrink-0 border-t border-gray-200 px-4 py-6 sm:px-6 lg:w-96 lg:border-l lg:border-t-0 lg:pr-8 xl:pr-6">

                    <ul role="list" class="divide-y divide-gray-100">
                        <li v-for="project in projects" :key="project.id" class="flex items-center justify-between gap-x-6 py-5">
                            <div class="min-w-0">
                                <div class="flex items-start gap-x-3">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">
                                        {{ project.version }}
                                    </p>
                                    <p :class="[statuses[project.status], 'rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset']">{{ project.status }}</p>
                                </div>
                                <div class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                                    <p class="whitespace-nowrap">
                                        Updated : <time :datetime="project.updatedTime">{{ project.updated }}</time>
                                    </p>
                                    <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 fill-current">
                                        <circle cx="1" cy="1" r="1" />
                                    </svg>
                                    <p class="truncate">Created by {{ project.createdBy }}</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </InstallLayout>
</template>
<script setup>
import InstallLayout from "@application-install/Pages/InstallLayout.vue";
const statuses = {
    Stable: 'text-green-700 bg-green-50 ring-green-600/20',
    Development: 'text-gray-600 bg-gray-50 ring-gray-500/10',
    Archived: 'text-yellow-800 bg-yellow-50 ring-yellow-600/20',
}
const projects = [
    {
        id: 1,
        version : '0.0.1',
        status: 'Stable',
        href: '#',
        createdBy: 'Leslie Alexander',
        updated: 'March 17, 2023',
        updatedTime: '2023-03-17T00:00Z',
    },
    {
        id: 2,
        version : '0.0.1',
        href: '#',
        status: 'Development',
        createdBy: 'Leslie Alexander',
        updated: 'May 5, 2023',
        updatedTime: '2023-05-05T00:00Z',
    },
    {
        id: 3,
        version : '0.0.1',
        href: '#',
        status: 'Development',
        createdBy: 'Courtney Henry',
        updated: 'May 25, 2023',
        updatedTime: '2023-05-25T00:00Z',
    },
    {
        id: 4,
        version : '0.0.1',
        href: '#',
        status: 'Archived',
        createdBy: 'Leonard Krasner',
        updated: 'June 7, 2023',
        updatedTime: '2023-06-07T00:00Z',
    },
    {
        id: 5,
        version : '0.0.1',
        href: '#',
        status: 'Archived',
        createdBy: 'Courtney Henry',
        updated: 'June 10, 2023',
        updatedTime: '2023-06-10T00:00Z',
    },
]
</script>
