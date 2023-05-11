
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <link rel="stylesheet" href="css/style.css">
    <title>products_list</title>
</head>
<body dir="rtl">
<?php

include 'db.php';

$text='';
if(isset($_GET['search_btn']))
{
//نمایش محصولاتی که کاربر جستجو کرده

$text=$_GET['search_text'];
$sql="SELECT* FROM products WHERE   p_name  LIKE '%$text%' OR ram  LIKE '%$text%'OR cpu  LIKE '%$text%' ";
$result = $conn->query($sql);
$productList=$result->fetch_all(MYSQLI_ASSOC);



}
else{
//نمایش همه محصولات موجود
$sql="SELECT* FROM products WHERE status='available'  ";
$result = $conn->query($sql);
$productList=$result->fetch_all(MYSQLI_ASSOC);
}
?>




<form action="products_list.php" method="get">
<input type="text" name="search_text" value="<?php $text ?>"style="width: 30%">
<input type="submit" name="search_btn" value="جستجو" >
</form>

<h3>لیست محصولات</h3>
<table class="datatable" >
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
 <td><a href='productDetail_controler.php?id={$product['id']}' >اطلاعات بیشتر</a></td>

 </tr>

";
}
?>
</table>
    
</body>
</html>