<template>
    <div v-if="d_panel">
        <div class="flex justify-between">
            <div class="inline-flex rounded-md shadow-sm mt-4 mb-6">
                <a href="#" aria-current="page"
                   :class="focus_btn == 'all' ? 'bg-indigo-600 text-gray-50' : 'hover:bg-gray-100 hover:text-blue-700' "
                   @click="sorttype('all')"
                   class="py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-b border-gray-200 focus:outline-none ">
                    หน้าหลัก
                </a>
                <a href="#"
                   :class="focus_btn == 'plantscis' ? 'bg-indigo-600 text-gray-50' : 'hover:bg-gray-100 hover:text-blue-700' "
                   @click="sorttype('plantscis')"
                   class="py-2 px-4 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 outline-none">
                    พรรณไม้
                </a>
                <a href="#"
                   :class="focus_btn == 'herbaria' ? 'bg-indigo-600 text-gray-50' : 'hover:bg-gray-100 hover:text-blue-700' "
                   @click="sorttype('herbaria')"
                   class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 outline-none">
                    พรรณไม้อัดแห้ง
                </a>
            </div>

            <div class="my-auto">
                <input type="text" v-model="search" placeholder="ค้นหา" class="rounded">
            </div>
        </div>

        <div class="grid grid-cols-4 gap-y-8 ">
            <div v-for="plant in filter_search"
            >
                <div class="max-w-sm w-60 h-80 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700"
                     v-if="sortdata==plant['kind'] || sortdata=='all'">

                    <a href="#">
                        <img class="w-full h-48 rounded-t-lg" v-bind:src="'/storage/pics/plants/'+plant.picture"
                             alt="pic-something">
                    </a>
                    <div class="p-5">
                        <h5 class="mb-2 h-12 font-semibold tracking-tight text-gray-900 dark:text-white">{{
                                plant.name
                            }}</h5>
                        <a href="#" @click="detail(plant)"
                           class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            รายละเอียด
                            <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div v-else>
        <form method="POST" :action="'/api/v1/plants/'+focus_plant.id" enctype="multipart/form-data" style="width:800px"
              class="mx-auto">
            <button class="hidden" type="submit" ref="btn_submit">sent</button>
            <input type="hidden" name="_method" value="PUT">
            <img class="rounded-2xl mb-10 mt-4 mx-auto w-96 h-80"
                 v-bind:src="'/storage/pics/plants/'+focus_plant['picture']">


            <div v-if="focus_plant['kind']=='plantscis'">
                <div v-for="plant in plantscis" class="mb-6">
                    <label :for="plant.eng" class="block mb-2 ">{{ plant.thai }}
                    </label>
                    <input
                        class="shadow-sm border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        :class="form_bg"
                        :name="plant.eng"
                        v-model="focus_plant[plant.eng]"
                        :readonly="!editmode"
                    >
                </div>
            </div>
            <div v-else class="mb-6">
                <div v-for="plant in herbaria" class="mb-6">
                    <label :for="plant.eng" class="block mb-2 ">{{ plant.thai }}
                    </label>
                    <input
                        class="shadow-sm border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        v-model="focus_plant[plant.eng]"
                        :class="form_bg"
                        :name="plant.eng"
                        :readonly="!editmode"
                    >
                </div>
            </div>

            <div v-if="editmode" class="mb-6">
                <label for="picture" class="block mb-2 ">รูปภาพ
                </label>
                <input id="picture" type="file" name="picture">

            </div>
            <div v-if="editmode" class="mb-6">
                <label for="qrcode" class="block mb-2 ">QR Code
                </label>
                <input id="qrcode" type="file" name="qrcode">
            </div>

            <div v-if="focus_plant.qrcode" class="mb-6">
                <img class="mx-auto w-64 h-64" v-bind:src="'/storage/pics/qrcode/'+focus_plant['qrcode']" alt="qrcode">
            </div>
        </form>
        <hr>
        <div class="flex space-x-6 justify-center my-10">
            <div class="flex space-x-6 h-10">
                <button @click="d_panel=true" class="flex px-3 py-2 rounded bg-gray-300 hover:bg-gray-400 outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3"/>
                    </svg>
                    &nbsp;&nbsp;&nbsp;ย้อนกลับ
                </button>
                <button v-if="!editmode" @click="open_editmode"
                        class="flex px-3 py-2 rounded bg-yellow-400 hover:bg-yellow-500  outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                    </svg>
                    &nbsp;แก้ไข
                </button>
                <button v-else @click="$refs.btn_submit.click()"
                        class="flex px-3 py-2 rounded bg-yellow-500 outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                    </svg>
                    &nbsp;อัพเดท
                </button>
            </div>
            <form method="POST" :action="'/api/v1/plants/'+focus_plant.id">
                <input name="_method" type="hidden" value="DELETE">
                <button class="flex px-3 py-2 rounded bg-red-500 hover:bg-red-600 text-gray-50 h-10 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                    </svg>
                    &nbsp;ลบข้อมูล
                </button>
            </form>
        </div>
    </div>

</template>

<script>
export default {
    data() {
        return {
            plants: [],
            d_panel: true,
            focus_plant: {},
            editmode: false,
            focus_btn: 'all',
            form_bg: 'bg-gray-50',
            sortdata: 'all',
            search:"",
            plantscis: [
                {eng: "sci_name", thai: "ชื่อวิทยาศาสตร์"},
                {eng: "family", thai: "ชื่อวงศ์"},
                {eng: "name", thai: "ชื่อสามัญ"},
                {eng: "genus", thai: "สกุลพืช"},
                {eng: "trunk", thai: "ลำต้น"},
                {eng: "leaf", thai: "ใบ"},
                {eng: "bloom", thai: "ดอก"},
                {eng: "fruit", thai: "ผล"},
                {eng: "seed", thai: "เมล็ด"},
                {eng: "property", thai: "ประโยชน์/สรรพคุณ"},
                {eng: "type", thai: "ประเภทพรรณไม้"},
                {eng: "cropping", thai: "วิธีการปลูก"},
                {eng: "care", thai: "วิธีการดูแล"},
                {eng: "belief", thai: "ความเชื่อ"},
                {eng: "clime", thai: "ถิ่นกำเนิด"}
            ],
            herbaria: [
                {eng: "sci_name", thai: "ชื่อวิทยาศาสตร์"},
                {eng: "family", thai: "ชื่อวงศ์"},
                {eng: "name", thai: "ชื่อสามัญ"},
                {eng: "container", thai: "รหัสตู้"},
                {eng: "leaf", thai: "ใบ"},
                {eng: "bloom", thai: "ดอก"},
                {eng: "property", thai: "ประโยชน์/สรรพคุณ"},
                {eng: "cropping", thai: "วิธีการปลูก"},
                {eng: "care", thai: "วิธีการดูแล"},
                {eng: "belief", thai: "ความเชื่อ"},
                {eng: "clime", thai: "ถิ่นกำเนิด"}
            ]

        }

    },
    mounted() {
        fetch('/api/v1/plants')
            .then((response) => response.json())
            .then((data) => {
                this.plants = data;
            })
    },
    methods: {
        open_editmode() {
            this.editmode = true;
            this.form_bg = 'bg-white';
        },
        detail(plant) {
            this.editmode = false;
            this.form_bg = 'bg-gray-50';
            this.d_panel = false;
            this.focus_plant = plant;
            this.$emit('rmCreate', false);
            this.$emit('card_title', plant.name);
        },
        sorttype(typesort) {
            this.sortdata = typesort;
            this.focus_btn = typesort;
        }
    }, watch: {
        d_panel(olddata, newdata) {
            this.$emit('rmCreate', olddata);
        }
    }, computed: {
        filter_search() {
            if (this.dataplants === undefined) {
                return true;
            }
            return this.dataplants.filter((data) => {
                if (data.name.indexOf(this.search) !== -1 || this.search === '') {
                    return data;
                }
            });
        },
        dataplants() {
            if (this.sortdata == 'question') {
                this.d_question = true;
            } else {
                return this.plants.filter((data) => {
                    return this.sortdata == data['kind'] || this.sortdata == 'all';
                })
            }
        }
    }
}
</script>

<style scoped>

</style>
