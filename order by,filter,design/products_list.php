
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <title>Document</title>
</head>
<body>
<?php

include 'db.php';

//نمایش محصولاتی که مدل پردازنده آنها ای ام دی است از ارزان به گران
$sql="SELECT* FROM products WHERE cpu LIKE '%AMD%' ORDER BY price ASC  ";
$result = $conn->query($sql);
$productList=$result->fetch_all(MYSQLI_ASSOC);
?>
<h3>ارزان ترین محصولات</h3>
<table style="width: 100%; ">
<th>id</th>
<th>نام کالا</th>
<th>قیمت (تومان)</th>
<th>تعداد</th>
<th>مادر بورد</th>
<th>پردازنده</th>
<th>  کارت گرافیک</th>

<th> حافظه </th>
<th>وضعیت کالا </th>
<th>تصویر کالا</th>
<th></th>
<?php
foreach ($productList as $product)
{
 //  var_dump($product);
echo"
 <tr>
 <td>{$product['id']}</td> 
 <td>{$product['p_name']}</td> 
 <td>{$product['price']}</td> 
 <td>{$product['count']}</td> 
 <td>{$product['mother_board']}</td> 
 <td>{$product['cpu']}</td> 
 <td>{$product['gpu']}</td> 
 <td>{$product['ram']}</td> 
 <td>{$product['status']}</td> 
 <td>{$product['p_image']}</td> 
  <td><a href ='soft_delete_product.php?id={$product['id']}'>حذف</a></td>
 
 </tr>

";
}
?>
</table>
    
</body>
</html>