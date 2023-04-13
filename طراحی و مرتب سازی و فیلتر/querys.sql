
//مرتب سازی از  ارزان ترین محصولات به گرانترین

SELECT* FROM products ORDER BY price ASC 


//فیلتر  بر اساس پردازنده هایی که مدل آنها ای ام دی است


SELECT * FROM `products` WHERE cpu LIKE '%AMD%';