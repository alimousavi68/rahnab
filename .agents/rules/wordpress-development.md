---
trigger: always_on
---

# استاندارد توسعه WordPress


## معماری

از استانداردهای Classic Theme استفاده کن.


رعایت کن:

- Template Hierarchy
- functions.php استاندارد
- enqueue کردن CSS و JS
- استفاده از Hook ها


---

## ممنوع

انجام نده:

- تغییر فایل‌های Core وردپرس
- قرار دادن CSS داخل فایل PHP
- قرار دادن JS به صورت inline بدون دلیل
- استفاده از کدهای Deprecated


---

## PHP

کدها باید:

- سازگار با PHP 8+
- خوانا
- Modular
- قابل توسعه


باشند.


---

## Security

همیشه:

برای خروجی:

esc_html()
esc_attr()
wp_kses()


برای ورودی:

sanitize_*()


استفاده کن.


برای عملیات حساس:

Nonce
Capability Check

را رعایت کن.