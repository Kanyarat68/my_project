<template>
    <div v-if="d_panel" class="bg-gray-50 px-16 py-6 rounded">
        <div class="flex justify-between mb-4">
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
                   class="py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-200 outline-none">
                    พรรณไม้อัดแห้ง
                </a>
                <a href="#"
                   :class="focus_btn == 'question' ? 'bg-indigo-600 text-gray-50' : 'hover:bg-gray-100 hover:text-blue-700' "
                   class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 outline-none"
                   @click="sorttype('question')"
                >
                    คำถามยอดฮิต
                </a>
                <a href="#"
                   :class="focus_btn == 'map' ? 'bg-indigo-600 text-gray-50' : 'hover:bg-gray-100 hover:text-blue-700' "
                   class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 outline-none"
                   @click="sorttype('map')"
                >
                    แผนที่
                </a>
            </div>
            <div class="my-auto">
                <input type="text" v-model="search" placeholder="ค้นหา" class="rounded">
            </div>
        </div>
        <div class="p-4 flex flex-col space-y-8 " v-if="d_question">
            <div>
                <h2 class="text-2xl font-semibold">
                    พรรณไม้ใดบ้างให้สรรพคุณเป็นยารักษาโรค
                </h2>
                <ul class="pl-10">
                    <li class="list-disc">โสน</li>
                    <li class="list-disc">ผักบุ้ง</li>
                    <li class="list-disc">ผักแว่น</li>
                    <li class="list-disc">บัวหลวง</li>
                    <li class="list-disc">บัวสาย</li>
                    <li class="list-disc">เตยหอม</li>
                    <li class="list-disc">เอื้องหมายนา</li>
                    <li class="list-disc">ส้มกบ</li>
                    <li class="list-disc">แห้วหมูหรือหญ้าขนหนู</li>
                    <li class="list-disc">กกตุ้มหู</li>
                    <li class="list-disc">กกลังกา</li>
                </ul>
            </div>

            <div>
                <h2 class="text-2xl font-semibold">
                    พรรณไม้ให้กลิ่นหอม
                </h2>
                <ul class="pl-10">
                    <li class="list-disc">จาปี</li>
                    <li class="list-disc">มะลิก้านแดง</li>
                    <li class="list-disc">แก้วเจ้าจอม</li>
                    <li class="list-disc">พุดน้าบุศย์,พุดน้าบุษย์</li>
                    <li class="list-disc">สเลเต</li>
                    <li class="list-disc">ราชาวดี</li>
                    <li class="list-disc">ประยงค์</li>
                    <li class="list-disc">บุหงาส่าหรี</li>
                </ul>
            </div>

            <div>
                <h2 class="text-2xl font-semibold">พรรณไม้ใดให้ะโยชน์ทั้งต้นด้านลดไข้ ขับปัสสาวะ
                    รักษาแผลไฟไหม้น้้าร้อนลวก</h2>
                <p class="pl-10">ตอบ: ฤาษีผสม</p>
            </div>
            <div>
                <h2 class="text-2xl font-semibold">ต้นชิงหลังขาวมีชื่อเรียกอีกอย่างว่าชื่ออะไรและจัดอยู่ในประเภทใด</h2>
                <p class="pl-10">ตอบ: พระยาถลาง จัดอยู่ในประเภท ปาล์มต้นเดี่ยว</p>
            </div>

            <div>
                <h2 class="text-2xl font-semibold">ขั้นตอนการจัดจาแนก</h2>
                <ul class="pl-10">
                    <li class="list-decimal">
                        จัดแยกประเภทพรรณไม้ออกเป็น 2 ประเภทคือ
                        <p>
                            1.1 พืชมีดอก ได้แก่ พืชใบเลี้ยงคู่และพืชใบเลี้ยงเดี่ยว
                        </p>
                        <p>
                            1.2 พืชไร้ดอก หรือ พืชชั้นต่ำ
                        </p>
                    </li>

                    <li class="list-decimal">
                        ในแต่ละประเภทจำแนกออกเป็นวงศ์ (Family) และสกุล (Genus) โดยเรียงจำกอักษร A-Z ตำมลำดับ
                    </li>
                    <li class="list-decimal">
                        เมื่อจัดจำแนกเรียบร้อยแล้ว นำตัวอย่ำงแต่ละชิ้นมำทำกำรปัดฝุ่นและเช็ดทำควำมสะอำดด้วยขนแปรง
                        และนำไปเรียงไว้ในตู้ตำมตัวอักษร
                    </li>
                    <li class="list-decimal">
                        กำรจัดเรียงในตู้จะวำงเรียงตำมอักษร A-Z โดยวำงเรียงจำกบนลงล่ำง
                    </li>
                </ul>
            </div>

            <div class="text-lg text-center">
                <h2 class="text-2xl font-semibold">ขั้นตอนการสืบค้นข้อมูล</h2>
                <div class="mt-6">ลงชื่อเข้าใช้บริการ</div>
                <svg class="mx-auto" version="1.0" xmlns="http://www.w3.org/2000/svg"
                     width="50.000000pt" height="50.000000pt" viewBox="0 0 100.000000 100.000000"
                     preserveAspectRatio="xMidYMid meet">
                    <metadata>
                        Created by potrace 1.10, written by Peter Selinger 2001-2011
                    </metadata>
                    <g transform="translate(0.000000,100.000000) scale(0.100000,-0.100000)"
                       fill="#000000" stroke="none">
                        <path d="M440 613 l0 -307 -50 49 -50 49 -43 -42 -42 -42 123 -122 122 -123
122 123 123 122 -42 42 -43 42 -50 -49 -50 -49 0 307 0 307 -60 0 -60 0 0
-307z m100 -28 c0 -173 3 -315 7 -315 4 0 31 23 60 52 l53 52 27 -27 28 -27
-108 -108 -107 -107 -107 107 -108 108 28 27 27 27 53 -52 c29 -29 56 -52 60
-52 4 0 7 142 7 315 l0 315 40 0 40 0 0 -315z"/>
                        <path d="M340 314 c0 -6 14 -23 30 -39 17 -16 30 -24 30 -19 0 6 -13 23 -30
39 -16 16 -30 24 -30 19z"/>
                        <path d="M595 260 c-32 -33 -57 -62 -54 -64 3 -3 32 21 64 54 32 33 57 62 54
64 -3 3 -32 -21 -64 -54z"/>
                    </g>
                </svg>
                <div>ข้อมูลชื่อวงศ์ ( Family ) และสกุล ( Genus ) หรือชื่อไทย (สามัญ) ของพรรณไม้ที่ต้องการสืบค้น</div>
                <svg class="mx-auto" version="1.0" xmlns="http://www.w3.org/2000/svg"
                     width="50.000000pt" height="50.000000pt" viewBox="0 0 100.000000 100.000000"
                     preserveAspectRatio="xMidYMid meet">
                    <metadata>
                        Created by potrace 1.10, written by Peter Selinger 2001-2011
                    </metadata>
                    <g transform="translate(0.000000,100.000000) scale(0.100000,-0.100000)"
                       fill="#000000" stroke="none">
                        <path d="M440 613 l0 -307 -50 49 -50 49 -43 -42 -42 -42 123 -122 122 -123
122 123 123 122 -42 42 -43 42 -50 -49 -50 -49 0 307 0 307 -60 0 -60 0 0
-307z m100 -28 c0 -173 3 -315 7 -315 4 0 31 23 60 52 l53 52 27 -27 28 -27
-108 -108 -107 -107 -107 107 -108 108 28 27 27 27 53 -52 c29 -29 56 -52 60
-52 4 0 7 142 7 315 l0 315 40 0 40 0 0 -315z"/>
                        <path d="M340 314 c0 -6 14 -23 30 -39 17 -16 30 -24 30 -19 0 6 -13 23 -30
39 -16 16 -30 24 -30 19z"/>
                        <path d="M595 260 c-32 -33 -57 -62 -54 -64 3 -3 32 21 64 54 32 33 57 62 54
64 -3 3 -32 -21 -64 -54z"/>
                    </g>
                </svg>
                <div>เปิดคู่มือสืบค้นตัวอย่างพรรณไม้อัดแห้งเพื่อทราบตู้ที่เก็บพืชนั้นๆ</div>
                <svg class="mx-auto" version="1.0" xmlns="http://www.w3.org/2000/svg"
                     width="50.000000pt" height="50.000000pt" viewBox="0 0 100.000000 100.000000"
                     preserveAspectRatio="xMidYMid meet">
                    <metadata>
                        Created by potrace 1.10, written by Peter Selinger 2001-2011
                    </metadata>
                    <g transform="translate(0.000000,100.000000) scale(0.100000,-0.100000)"
                       fill="#000000" stroke="none">
                        <path d="M440 613 l0 -307 -50 49 -50 49 -43 -42 -42 -42 123 -122 122 -123
122 123 123 122 -42 42 -43 42 -50 -49 -50 -49 0 307 0 307 -60 0 -60 0 0
-307z m100 -28 c0 -173 3 -315 7 -315 4 0 31 23 60 52 l53 52 27 -27 28 -27
-108 -108 -107 -107 -107 107 -108 108 28 27 27 27 53 -52 c29 -29 56 -52 60
-52 4 0 7 142 7 315 l0 315 40 0 40 0 0 -315z"/>
                        <path d="M340 314 c0 -6 14 -23 30 -39 17 -16 30 -24 30 -19 0 6 -13 23 -30
39 -16 16 -30 24 -30 19z"/>
                        <path d="M595 260 c-32 -33 -57 -62 -54 -64 3 -3 32 21 64 54 32 33 57 62 54
64 -3 3 -32 -21 -64 -54z"/>
                    </g>
                </svg>
                <div>เปิดตู้ที่มีตัวอย่างพรรณไม้ที่เราต้องการหา</div>
                <svg class="mx-auto" version="1.0" xmlns="http://www.w3.org/2000/svg"
                     width="50.000000pt" height="50.000000pt" viewBox="0 0 100.000000 100.000000"
                     preserveAspectRatio="xMidYMid meet">
                    <metadata>
                        Created by potrace 1.10, written by Peter Selinger 2001-2011
                    </metadata>
                    <g transform="translate(0.000000,100.000000) scale(0.100000,-0.100000)"
                       fill="#000000" stroke="none">
                        <path d="M440 613 l0 -307 -50 49 -50 49 -43 -42 -42 -42 123 -122 122 -123
122 123 123 122 -42 42 -43 42 -50 -49 -50 -49 0 307 0 307 -60 0 -60 0 0
-307z m100 -28 c0 -173 3 -315 7 -315 4 0 31 23 60 52 l53 52 27 -27 28 -27
-108 -108 -107 -107 -107 107 -108 108 28 27 27 27 53 -52 c29 -29 56 -52 60
-52 4 0 7 142 7 315 l0 315 40 0 40 0 0 -315z"/>
                        <path d="M340 314 c0 -6 14 -23 30 -39 17 -16 30 -24 30 -19 0 6 -13 23 -30
39 -16 16 -30 24 -30 19z"/>
                        <path d="M595 260 c-32 -33 -57 -62 -54 -64 3 -3 32 21 64 54 32 33 57 62 54
64 -3 3 -32 -21 -64 -54z"/>
                    </g>
                </svg>
                <div>สังเกตปกสีน้าตาล ( มุมขวาล่าง) จะระบุชื่อวงศ์ (อักษร A-Z ตัวแรก)และมีหมายเลขกากับอยู่</div>
                <svg class="mx-auto" version="1.0" xmlns="http://www.w3.org/2000/svg"
                     width="50.000000pt" height="50.000000pt" viewBox="0 0 100.000000 100.000000"
                     preserveAspectRatio="xMidYMid meet">
                    <metadata>
                        Created by potrace 1.10, written by Peter Selinger 2001-2011
                    </metadata>
                    <g transform="translate(0.000000,100.000000) scale(0.100000,-0.100000)"
                       fill="#000000" stroke="none">
                        <path d="M440 613 l0 -307 -50 49 -50 49 -43 -42 -42 -42 123 -122 122 -123
122 123 123 122 -42 42 -43 42 -50 -49 -50 -49 0 307 0 307 -60 0 -60 0 0
-307z m100 -28 c0 -173 3 -315 7 -315 4 0 31 23 60 52 l53 52 27 -27 28 -27
-108 -108 -107 -107 -107 107 -108 108 28 27 27 27 53 -52 c29 -29 56 -52 60
-52 4 0 7 142 7 315 l0 315 40 0 40 0 0 -315z"/>
                        <path d="M340 314 c0 -6 14 -23 30 -39 17 -16 30 -24 30 -19 0 6 -13 23 -30
39 -16 16 -30 24 -30 19z"/>
                        <path d="M595 260 c-32 -33 -57 -62 -54 -64 3 -3 32 21 64 54 32 33 57 62 54
64 -3 3 -32 -21 -64 -54z"/>
                    </g>
                </svg>
                <div>เมื่อพบชิ้นตัวอย่างที่ต้องการหา หยิบออกมาอย่างระมัดระวัง เพื่อป้องกันการแตกหัก</div>
                <svg class="mx-auto" version="1.0" xmlns="http://www.w3.org/2000/svg"
                     width="50.000000pt" height="50.000000pt" viewBox="0 0 100.000000 100.000000"
                     preserveAspectRatio="xMidYMid meet">
                    <metadata>
                        Created by potrace 1.10, written by Peter Selinger 2001-2011
                    </metadata>
                    <g transform="translate(0.000000,100.000000) scale(0.100000,-0.100000)"
                       fill="#000000" stroke="none">
                        <path d="M440 613 l0 -307 -50 49 -50 49 -43 -42 -42 -42 123 -122 122 -123
122 123 123 122 -42 42 -43 42 -50 -49 -50 -49 0 307 0 307 -60 0 -60 0 0
-307z m100 -28 c0 -173 3 -315 7 -315 4 0 31 23 60 52 l53 52 27 -27 28 -27
-108 -108 -107 -107 -107 107 -108 108 28 27 27 27 53 -52 c29 -29 56 -52 60
-52 4 0 7 142 7 315 l0 315 40 0 40 0 0 -315z"/>
                        <path d="M340 314 c0 -6 14 -23 30 -39 17 -16 30 -24 30 -19 0 6 -13 23 -30
39 -16 16 -30 24 -30 19z"/>
                        <path d="M595 260 c-32 -33 -57 -62 -54 -64 3 -3 32 21 64 54 32 33 57 62 54
64 -3 3 -32 -21 -64 -54z"/>
                    </g>
                </svg>
                <div>เมื่อศึกษาเสร็จแล้ว เก็บเข้าในตู้ โดยวางไว้ที่เดิม อย่างเรียบร้อย
                    หรือหากไม่แน่ใจให้วางไว้ในตาแหน่งที่ป้ายชี้บอก " รอจัดเก็บเข้าตู้ "
                </div>
            </div>

        </div>
        <div class="p-4 flex flex-col space-x-8 overflow-auto" v-if="d_map">
            <div class="mt-24 mx-auto grid grid-cols-30 grid-rows-30 scale-150 bg-center bg-no-repeat bg-right-bottom "
                 style="background-image: url('/storage/pics/map/1.jpg');width: 1200px;height: 600px">
                <div v-for="i in 900">
                    <div v-if="i in marks">
                        <div class="relative sm:max-w-xl sm:mx-auto">
                            <div
                                class="group cursor-pointer relative inline-block text-center">
                                <svg @mouseover="mousepoint(i)"
                                     style="enable-background:new 0 0 512 512;width: 24px;height: 24px" version="1.1"
                                     viewBox="0 0 512 512"
                                     xml:space="preserve"
                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="_x32_3_x2C__Location_x2C__map_x2C__pin_x2C__mark_x2C__navigation"><g><path d="M256,32.7c85.36,0,154.53,69.2,154.53,154.53c0,64-114.82,220.49-154.53,292.07    c-38.07-68.7-154.53-231.83-154.53-292.07C101.47,101.9,170.67,32.7,256,32.7z M325.07,181.41c0-38.03-31.02-69.05-69.07-69.05    c-38.02,0-69.04,31.02-69.04,69.05c0,38.02,31.02,69.04,69.04,69.04C294.05,250.45,325.07,219.43,325.07,181.41z" style="fill:#E74C3C;"/><path
                                    d="M256,489.3c-0.001,0-0.001,0-0.002,0c-3.635-0.001-6.982-1.974-8.745-5.153c-10.098-18.222-25.631-42.934-43.617-71.547    C153.663,333.102,91.47,234.162,91.47,187.23C91.47,96.508,165.278,22.7,256,22.7s164.53,73.808,164.53,164.53    c0,49.378-58.682,141.696-110.456,223.147c-17.792,27.99-34.597,54.428-45.33,73.774C262.981,487.328,259.634,489.3,256,489.3z     M256,42.7c-79.694,0-144.53,64.836-144.53,144.53c0,41.168,63.056,141.481,109.098,214.726    c13.602,21.64,25.813,41.065,35.442,57.316c10.349-17.405,23.477-38.059,37.186-59.625    C338.493,328.386,400.53,230.79,400.53,187.23C400.53,107.536,335.694,42.7,256,42.7z"/><path
                                    d="M256,260.45c-43.583,0-79.04-35.457-79.04-79.04c0-43.588,35.457-79.05,79.04-79.05c43.599,0,79.07,35.462,79.07,79.05    C335.07,224.993,299.599,260.45,256,260.45z M256,122.36c-32.555,0-59.04,26.49-59.04,59.05c0,32.555,26.485,59.04,59.04,59.04    c32.571,0,59.07-26.485,59.07-59.04C315.07,148.85,288.571,122.36,256,122.36z"/></g></g>
                                    <g id="Layer_1"/></svg>
                                <div
                                    class="opacity-0 bg-black text-white text-center rounded-lg py-1 absolute z-10 group-hover:opacity-100 bottom-full -left-7  px-1 mb-1.5  pointer-events-none w-20" style="font-size: 10px">
                                    {{ marks[i] }}
                                    <svg class="absolute text-black h-2 w-full left-0 top-full" x="0px" y="0px"
                                         viewBox="0 0 255 255" xml:space="preserve"><polygon class="fill-current" points="0,0 127.5,127.5 255,0"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-y-8">
            <div v-for="plant in filter_search">
                <div class="max-w-sm w-60 h-80 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
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
    <div v-else style="width:800px"
         class="mx-auto mt-16">
        <img class="rounded-2xl mb-10 mt-4 mx-auto w-96 h-80 shadow-xl"
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
        <div v-if="focus_plant.qrcode" class="mb-6">
            <img class="mx-auto w-64 h-64" v-bind:src="'/storage/pics/qrcode/'+focus_plant['qrcode']" alt="qrcode">
        </div>
        <button @click="d_panel=true" class="py-3 px-5 text-gray-50 bg-gray-500 rounded flex mx-auto mb-20">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3"/>
            </svg>
            &nbsp;&nbsp;&nbsp;ย้อนกลับ
        </button>
    </div>

</template>
<script>
import tree from "../data/treedata"

export default {
    data() {
        return {
            marks: tree,
            plants: [],
            d_panel: true,
            d_question: false,
            d_map: false,
            focus_plant: {},
            editmode: false,
            focus_btn: 'all',
            form_bg: 'bg-gray-50',
            sortdata: 'all',
            search: "",
            plantscis: [
                {eng: "sci_name", thai: "ชื่อวิทยาศาสตร์"},
                {eng: "name", thai: "ชื่อสามัญ"},
                {eng: "family", thai: "ชื่อวงศ์"},
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
                {eng: "name", thai: "ชื่อสามัญ"},
                {eng: "container", thai: "รหัสตู้"},
                {eng: "family", thai: "ชื่อวงศ์"},
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
        mousepoint(index) {
            console.log(index);
        },
        open_editmode() {
            this.editmode = true;
            this.form_bg = 'bg-white';
        },
        detail(plant) {
            this.editmode = false;
            this.form_bg = 'bg-gray-50';
            this.d_panel = false;
            this.focus_plant = plant;
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
    },
    computed: {
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
                this.d_map = false;
            } else if (this.sortdata == 'map') {
                this.d_question = false;
                this.d_map = true;
            } else {
                this.d_question = false;
                this.d_map = false;
                let afterfilter = this.plants.filter((data) => {
                    return this.sortdata == data['kind'] || this.sortdata == 'all';
                })
                return afterfilter;
            }
        }
    }
}
</script>

<style scoped>

</style>
