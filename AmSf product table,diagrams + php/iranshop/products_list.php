
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <title>Document</title>
</head>
<body>
<?php

include 'db.php';


$sql="SELECT* FROM products  ";

$result = $conn->query($sql);
$productList=$result->fetch_all();
?>
<table>
<th>id</th>
<th>نام کالا</th>
<th>قیمت (تومان)</th>
<th>تعداد</th>
<th>مادر بورد</th>
<th>  پردازنده</th>
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
 <td>{$product[0]}</td> 
 <td>{$product[1]}</td> 
 <td>{$product[2]}</td> 
 <td>{$product[3]}</td> 
 <td>{$product[4]}</td> 
 <td>{$product[5]}</td> 
 <td>{$product[6]}</td> 
 <td>{$product[7]}</td> 
 <td>{$product[8]}</td> 
 <td>{$product[9]}</td> 
  <td><a href ='soft_delete_product.php?id={$product[0]}'>حذف</a></td>
 
 </tr>

";
}
?>
</table>
    
</body>
</html>