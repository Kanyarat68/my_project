## File Structure

ไฟล์ Component สำหรับ Guest (ผู้เยี่ยมชม)
resources/js/Components/CardsPanelGuest.vue

### Panel mode

- ดึงข้อมูลจาก URL : GET /api/v1/plants
- นำข้อมูลทั้งหมดมาเก็บไว้ใน object และนำมาแสดงใน Template
- Filter ข้อมูลโดยดูจากปุ่ม selected option (ตัวเลือก: หน้าหลัก, พรรณไม้, ...)
- แสดงเฉพาะประเภทปุ่มที่ถูกเลือกเท่านั้น

### Read mode (ดูรายละเอียด)

- นำข้อมูลที่ดึงจาก URL : GET /api/v1/plants ก่อนหน้านี้ไปแสดงเพิ่มเติมในส่วนต่างๆ

ไฟล์ Component สำหรับ Admin
resources/js/Pages/CardsPanel.vue

การทำงานหลัก เหมือนกันยกเว้น Admin สามารถ

- Create
- Update
- Delete

สามารถดูข้อมูล API ได้ที่ routes/api.php

### Database (MySQL)

ชื่อตัวแปรตามชื่อคุณลักษณะพรรณไม้ที่ได้ให้ไว้

```mysql
create table plants
(
    id         bigint unsigned auto_increment
        primary key,
    kind       varchar(255)                          not null,
    sci_name   varchar(255)                          not null,
    name       varchar(255)                          not null,
    family     varchar(255)                          not null,
    genus      varchar(255)                          null,
    trunk      varchar(255)                          null,
    leaf       varchar(255)                          null,
    bloom      varchar(255)                          null,
    fruit      varchar(255)                          null,
    seed       varchar(255)                          null,
    property   longtext                              null,
    type       varchar(255)                          null,
    qrcode     varchar(255)                          null,
    picture    varchar(255)                          not null,
    cropping   varchar(255)                          null,
    care       varchar(255)                          null,
    belief     varchar(255)                          null,
    clime      varchar(255)                          null,
    updated_at timestamp default current_timestamp() not null on update current_timestamp(),
    created_at timestamp default current_timestamp() not null
)
```

สิ่งที่เพิ่มเติมเข้าไป <br>

1. kind = ประเภท: พรรณไม้สด, พรรณไม้แห้ง <br>
2. sci_name = ชื่อวิทยาศาสตร์
3. updated_at = อัพเดทล่าสุดเมื่อเวลา...(timestamp)
4. created_at = ถูกเสร้างเมื่อเวลา... (timestamp)

