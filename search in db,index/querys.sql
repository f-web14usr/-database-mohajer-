
//جستجوی لپ تاپ های موجود در سایت توسط کاربر

SELECT * FROM products WHERE p_name LIKE '%لپ تاپ%';



//ساخت ایندکس روی ردیف پردازنده


CREATE INDEX CPU ON products(cpu);
