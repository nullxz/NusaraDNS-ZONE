# เกี่ยวกับ
สคริปต์นี้ต้องใช้คู่กับ nsupdate ซึ่งเป็น Dynamic DNS update utility ของ BIND 9
# สคริปต์นี้มีอะไรบ้าง

หน้าเว็บ HTML พื้นฐานพร้อมแบบฟอร์มอย่างง่าย

![ภาพหน้าจอตัวอย่าง](https://raw.githubusercontent.com/nullxz/NusaraDNS-ZONE/main/screenshot/example.png)
# ความต้องการขั้นต่ำ
คุณต้องมี Name server ที่รองรับ RFC 2136 ทำงานบน Port 53 หรือ 853 สำหรับ TLS

และ HTTP Server พร้อม PHP-CGI

ณ เครื่องที่เรียกใช้งาน PHP-CGI ต้องมีไบนารี nsupdate และ dig ที่เรียกใช้งานได้ พร้อม TSIG Key สำหรับ AXFR

เบราว์เซอร์ต้องเปิดใช้งาน Javascript

อย่าลืมแก้ไข ```CONFIG.php```


**หมายเหตุ**: อย่าลืมกดปุ่มรีโหลด RR ทุกครั้งหลังจากส่งแบบฟอร์มไปแล้ว เพื่อให้ตัวอย่างที่แสดงเป็นปัจจุบัน

+ยังทำเมนู RR ไม่ครบทุกชนิด และ สคริปต์นี้ออกแบบให้ใช้ใน localhost เท่านั้น!! (เขียนโดยไม่ได้มีการออกแบบเพื่อความปลอดภัยใด ๆ เก็บคีย์ และ เซิร์ฟเวอร์ไว้ในที่ปลอดภัย!!)

**หากต้องการนำไปปรับปรุงก็เชิญเลยตามสบาย**

### #สิ่งที่ต้องทำในอนาคต

ทำให้โค้ดอ่านง่ายขึ้น

ทำให้โค้ดสั้นที่สุด ตัด if else เยอะ ๆ ออกรวมตัวแปรเป็นชิ้นเดียวกันเลย

เพิ่มตัวเลือกใน CONFIG ให้มีทางเลือกมากกว่านี้ เช่นสามารถแยกคีย์เป็นสองส่วนได้

เพิ่มตัวเลือกเปิดใช้ DNS over TLS สำหรับ dig และ nsupdate (nsupdate ต้องรอ BIND เวอร์ชั่น 9.19+ )
