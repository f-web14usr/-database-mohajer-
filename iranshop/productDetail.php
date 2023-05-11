<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    

    <title>Document</title>
</head>
<body>
<?php
       
 echo"

<div class='productDetail-container' >


<img   src='images/{$productInfo['p_image']}'  alt='برای این کالا  تصویری موجود نیست'>

<div class='product-body' >
<div>
<div class='product-head'>
<br><br><br>


<h2> نام محصول :{$productInfo['p_name']} </h2>
";
if( $productInfo['count'] >0)
{
    echo "<p> وضعیت موجودی :<span class='available'>موجود ($productInfo[count] عدد )</span></p>  ";
}
else
{
    echo "<p> موجودی :<span class='unavailable'>ناموجود </span></p>  ";
}
echo"


<h3 class='p-price'> قیمت: {$productInfo['price']}</h3>
<br>

</div>
<br><br><br>
";

echo"
</div>

<div>

<p class='p-content'>  مادربورد : {$productInfo['mother_board']}kg </p>
</div>


<div>

<p class='p-content'>  پردازنده : {$productInfo['cpu']}kg </p>
</div>



<div>

<p class='p-content'>حافظه : {$productInfo['ram']}mm </p>
</div>

<div>

<p class='p-content'> گرافیک :  {$productInfo['gpu']}</p>
</div>


<div>

<a href='basketProduct-controler.php?id={$productInfo['id']} ' class='p-content btn btn-sucsses' id='p-detail-button'>
<i class='fas fa-shopping-cart'></i>
افزودن به سبد خرید

</a>

</div>
</div>


</div>


";

?>
