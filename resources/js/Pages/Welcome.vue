<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import CardsPanelGuest from "@/Components/CardsPanelGuest.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
</script>

<template>
    <Head title="Welcome"/>
    <div class="py-12 bg-gradient-to-r from-cyan-500 to-blue-500">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div style="background-image: url('storage/pics/backgrounds/tabmain.jpg');" class="bg-no-repeat bg-center w-100 h-14 text-gray-50 px-5 py-2">{{ title }}</div>
                <div class=" border-b border-gray-200">
                    <button @click="addshow=false" v-if="btn_add" class="px-3 py-2 bg-green-400 rounded flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                        &nbsp;เพิ่มพืชชนิดใหม่
                    </button>
                    <CardsPanelGuest @card_title="change_card_title" v-else></CardsPanelGuest>
                </div>
            </div>
        </div>
    </div>


    <nav class="top-5 right-5 absolute ">
        <Link :href="route('login')" class="text-lg font-semibold   underline">Log in</Link>
        <Link v-if="canRegister" :href="route('register')"
              class="ml-4 text-lg font-semibold   underline">Register
        </Link>
    </nav>
</template>
<script>
export default {
    data() {
        return {
            title: "เว็บแอปพลิเคชั่นข้อมูลพรรณไม้ คณะวิทยาศาสตร์ มหาวิทยาลัยทัดษิณ"

            
        }
    },
    methods: {
        change_card_title(title) {
            this.title = title
        }
    }
}
</script>
