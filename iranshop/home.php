
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <title>Document</title>
</head>
<body dir="rtl">
<?php

include 'db.php';


//نمایش ارزان ترین محصولات 
$sql="SELECT DISTINCT * FROM products ORDER BY price ASC LIMIT 5 ";
$result = $conn->query($sql);
$productList=$result->fetch_all(MYSQLI_ASSOC);

?>




<h3>ارزان ترین محصولات</h3>
<table style="width: 100%">
<th>نام کالا</th>
<th>قیمت (تومان)</th>
<th>تعداد</th>
<th>مادر بورد</th>
<th>پردازنده</th>
<th>  کارت گرافیک</th>

<th> حافظه </th>
<th>تصویر کالا</th>
<?php
foreach ($productList as $product)
{
echo"
 <tr  >
 <td >{$product['p_name']}</td> 
 <td>{$product['price']}</td> 
 <td>{$product['count']}</td> 
 <td>{$product['mother_board']}</td> 
 <td>{$product['cpu']}</td> 
 <td>{$product['gpu']}</td> 
 <td>{$product['ram']}</td> 
 <td>{$product['p_image']}</td> 
 
 </tr>

";
}
?>
</table>
    <?php

    $sql="SELECT DISTINCT * FROM products ORDER BY id DESC  LIMIT 5";
    $result = $conn->query($sql);
    $productList=$result->fetch_all(MYSQLI_ASSOC);
    
    ?>

<h3>جدید ترین محصولات</h3>
<table style="width: 100%">
<th>ID</th>
<th>نام کالا</th>
<th>قیمت (تومان)</th>
<th>تعداد</th>
<th>مادر بورد</th>
<th>پردازنده</th>
<th>  کارت گرافیک</th>

<th> حافظه </th>
<?php
foreach ($productList as $product)
{
echo"
 <tr  >
 <td >{$product['id']}</td> 
 <td >{$product['p_name']}</td> 
 <td>{$product['price']}</td> 
 <td>{$product['count']}</td> 
 <td>{$product['mother_board']}</td> 
 <td>{$product['cpu']}</td> 
 <td>{$product['gpu']}</td> 
 <td>{$product['ram']}</td> 
 <td>{$product['p_image']}</td> 
 
 </tr>

";
}
?>
</table>


</body>
</html>