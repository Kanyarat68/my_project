<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import CardsPanel from '@/Pages/CardsPanel.vue';
import CreatePlant from "@/Components/CreatePlant.vue";
</script>

<template>
    <Head title="Dashboard"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
        <div class="py-12 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 0">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="w-100 h-10 bg-gray-700 text-gray-50 px-5 py-2">{{ title_bar }}</div>
                    <div class="p-6 bg-gray-100 border-b border-gray-200">
                        <button @click="addshow=false" v-if="btn_add" class="px-3 py-2 bg-green-400 rounded flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                            </svg>
                            &nbsp;เพิ่มพืชชนิดใหม่
                        </button>
                        <CreatePlant @rmCreate="change_add_btn" @titleChange="change_title"
                                     v-if="!addshow"></CreatePlant>
                        <CardsPanel @card_title="change_title" @rmCreate="change_add_btn" v-else></CardsPanel>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>

export default {
    data() {
        return {
            title_bar: 'Main',
            addshow: true,
            btn_add: true
        }
    },
    methods: {
        change_title(title) {
            this.title_bar = title
        },
        change_add_btn(status) {
            this.btn_add = status;
        }
    },
    watch: {
        d_panel(olddata, newdata) {
            if (newdata) {
                console.log(newdata);
                this.title_bar = "Main"
            }
        }
    }
}

</script>
