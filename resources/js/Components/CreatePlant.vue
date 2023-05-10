<template>
    <div>
        <div class="flex flex-col space-y-3 px-12">
            <label class="text-lg">กรุณาเลือกประเภทของพืช <span class="text-red-600">*</span></label>
            <div class="flex flex-wrap py-4">
                <div class="flex items-center mr-4">
                    <input id="green-radio" type="radio" value="plantscis" name="kind" v-model="kind" required=""
                           class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 focus:ring-2  ">
                    <label for="green-radio"
                           class="ml-2 text-sm font-medium">พรรณไม้สด</label>
                </div>

                <div class="flex items-center mr-4">
                    <input id="yellow-radio" type="radio" value="herbaria" name="kind" v-model="kind" required=""
                           class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 focus:ring-yellow-500 focus:ring-2 ">
                    <label for="yellow-radio"
                           class="ml-2 text-sm font-medium">พรรณไม้แห้ง</label>
                </div>
            </div>
        </div>
        <!-- Plantscis -->
        <div v-if="kind=='plantscis'">
            <form action="/api/v1/plants/create" method="post" enctype="multipart/form-data" class="px-12">
                <input type="hidden" name="kind" value="plantscis">
                <div v-for="plant in plantscis" class="my-7">
                    <label :for="plant.eng" class="block mb-2 ">{{ plant.thai }}&nbsp;<span v-if="plant.required"
                                                                                            class="text-red-600">*</span>
                    </label>
                    <input
                        class="shadow-sm border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        :name="plant.eng"
                        :required="plant.required"
                    >
                </div>
                <div class="mb-6">
                    <label for="picture" class="block mb-2 ">รูปภาพ <span class="text-red-600">*</span>
                    </label>
                    <input id="picture" type="file" name="picture" required="">

                </div>
                <div class="mb-6">
                    <label for="qrcode" class="block mb-2 ">QR Code
                    </label>
                    <input id="qrcode" type="file" name="qrcode">
                </div>
                <div class="flex space-x-4 ">
                    <a href="/dashboard"
                       class="px-3 py-2 bg-gray-400 hover:bg-gray-600 rounded text-gray-50  w-30 my-6 flex"
                       type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3"/>
                        </svg>
                        &nbsp;&nbsp;ย้อนกลับ
                    </a>
                    <button class="px-3 py-2 bg-indigo-600 hover:bg-indigo-800 rounded text-gray-50 flex w-40 my-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                        </svg>
                        &nbsp;&nbsp;
                        บันทึกข้อมูล
                    </button>
                </div>
            </form>
        </div>
        <!-- Herbaria -->
        <div v-else-if="kind=='herbaria'" class="my-7">
            <form action="/api/v1/plants/create" method="post" enctype="multipart/form-data" class="px-12">
                <input type="hidden" name="kind" value="herbaria">
                <div v-for="plant in herbaria" class="mb-6">
                    <label :for="plant.eng" class="block mb-2 ">{{ plant.thai }}&nbsp;<span v-if="plant.required"
                                                                                            class="text-red-600">*</span>
                    </label>
                    <input
                        class="shadow-sm border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        :name="plant.eng"
                        :required="plant.required"
                    >
                </div>
                <div class="mb-6">
                    <label for="picture" class="block mb-2 ">รูปภาพ <span class="text-red-600">*</span>
                    </label>
                    <input id="picture" type="file" name="picture" required="">

                </div>
                <div class="mb-6">
                    <label for="qrcode" class="block mb-2 ">QR Code
                    </label>
                    <input id="qrcode" type="file" name="qrcode">
                </div>
                <div class="flex space-x-4 ">
                    <a href="/dashboard"
                       class="px-3 py-2 bg-gray-400 hover:bg-gray-600 rounded text-gray-50  w-30 my-6 flex"
                       type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3"/>
                        </svg>
                        &nbsp;&nbsp;ย้อนกลับ
                    </a>
                    <button class="px-3 py-2 bg-indigo-600 hover:bg-indigo-800 rounded text-gray-50 flex w-40 my-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                        </svg>
                        &nbsp;&nbsp;
                        บันทึกข้อมูล
                    </button>
                </div>

            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "CreatePlant",
    props: ['titlebar'],
    setup(props, context) {
        context.emit("titleChange", "Create");
        context.emit("rmCreate", false);
    },
    data() {
        return {
            kind: '',

            plantscis: [
                {eng: "sci_name", thai: "ชื่อวิทยาศาสตร์", required: true},
                {eng: "family", thai: "ชื่อวงศ์", required: true},
                {eng: "name", thai: "ชื่อสามัญ", required: true},
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
                {eng: "sci_name", thai: "ชื่อวิทยาศาสตร์", required: true},
                {eng: "family", thai: "ชื่อวงศ์", required: true},
                {eng: "name", thai: "ชื่อสามัญ", required: true},
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
    }
}
</script>

<style scoped>

</style>
