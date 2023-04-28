<?php

include 'db.php';


$id = $_GET['id'];
$status=true;
if($status===true){
$sql="UPDATE products SET status='unavailable'WHERE id=$id";
$status=false;
}
else if ($status===false)
{
$sql="UPDATE products SET status='available'WHERE id=$id";
$status=true;
}
$result=$conn ->query($sql);
//echo "اطلاعات حساب شما باموفقیت ویرایش شد";



$conn->close();
?>