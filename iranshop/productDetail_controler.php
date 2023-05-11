<?php
session_start();
include 'db.php';
$pid=$_GET['id'];
$sql="SELECT* FROM products  WHERE id= $pid";

$result = $conn->query($sql);

$productInfo=$result ->fetch_array();

   

include 'productDetail.php';






$conn->close();
?>