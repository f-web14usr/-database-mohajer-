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

if (isset($_POST["post_comment"]))
{
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];

    $title = $_POST["title"];
    $comment =$_POST["comment"];
    $pid=$_GET['id'];
    $reply_of = 0;
  $date=date("Y/m/d");
    $sql = "INSERT INTO `comments`(`id`, `fullname`, `email`, `title`, `comment`, `pid`,`date`,`reply_of`)
     VALUES (null,'$fullname','$email','$title','$comment','$pid','$date','$reply_of');
    ";
    
    if ($conn->query($sql) === TRUE) {
      echo "پیام ثبت شد";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
   
}




if (isset($_POST["do_reply"]))
{
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $title = $_POST["title"];
    $comment =$_POST["comment"];
    $pid=$_POST["pid"];
    $reply_of = $_POST["reply_of"];
    $date=date("Y/m/d");


    $sql= "SELECT * FROM comments WHERE id = " . $reply_of;
    $result = $conn->query($sql);

    
 

    $sql_insert = "INSERT INTO comments(fullname, email,title, comment, pid, date, reply_of)
     VALUES ('" . $fullname . "', '" . $email . "', '" . $title . "', '" . $comment . "', '" . $pid . "', NOW(), '" . $reply_of . "')";
   
   if ($conn->query($sql_insert) === TRUE) {
    echo "<p>پاسخ شما به کامنت ثبت شد.</p>";
   }

}
 

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

<?php

 

$sql= "SELECT * FROM comments WHERE pid = " . $pid;
$result = $conn->query($sql);
$comments=$result->fetch_all(MYSQLI_ASSOC);
//print_r($comments);


foreach ($comments as $comment)
{
echo"


    <ul class='comments'>
    <li>
        <p>
                {$comment['fullname']}
        </p>

        <p>
                {$comment['title']}
        </p>

        <p>
                {$comment['comment']}
        </p>

        <p>
        {$comment['date']}
        </p>

        <div data-id='{$comment['id']} ' onclick='showReplyForm(this);'>پاسخ</div>

        <form action='productDetail_controler.php?id={$productInfo['id']}' method='post' id='form-{$comment['id']}'>
             
            <input type='hidden' name='reply_of' value=' {$comment['id']}' required>
            <input type='hidden' name='pid' value=' {$comment['pid']}' required>

            <p>
                <label>نام</label>
                <input type='text' name='fullname' required>
            </p>

            <p>
                <label>ایمیل</label>
                <input type='email' name='email' required>
            </p>


            <p>

            <label>عنوان</label>
            <input type='text' name='title' required>

            </p>


            <p>
                <label>متن کامنت</label>
                <textarea name='comment' required></textarea>
            </p>

            <p>
                <input type='submit' value='پاسخ' name='do_reply'>
            </p>
        </form>
    </li>
</ul>


<ul class='comments reply'>
";


$sql= "SELECT DISTINCT * FROM comments WHERE pid = $pid AND reply_of ={$comment['id']}";
$result = $conn->query($sql);
$replys=$result->fetch_all(MYSQLI_ASSOC);

    foreach ($replys as $reply)
        {
        echo" 
        <li>
            <p>
                
                {$reply['fullname']}

            </p>
 
            <p>
            {$reply['comment']}

            </p>
 
            <p>
            {$reply['date']}

            </p>
 
            <div onclick='showReplyForReplyForm(this)'data-name='{$reply['fullname']}' data-id='{$comment['id']}'> پاسخ</div>
        </li>
   
</ul>
";
           }


}
?>

<?php


echo"
</table>
<form class='form-container' action='productDetail_controler.php?id={$productInfo['id']}' method='post'>
 
    <input type='hidden' name='pid' value=' {$comment['pid']}' required>
 
    <p>
        <label>نام ونام خانوادگی</label>
        <input type='text' name='fullname'required>
    </p>
 
    <p>
        <label>ایمیل</label>
        <input type='email' name='email' required>
    </p>
    
    <p>
        <label>عنوان</label>
        <input type='text' name='title' required>
    </p>

    <p>
        <label>متن کامنت</label>
        <textarea name='comment' required cols='172' rows='5'></textarea>
    </p>
 
    <p>
        <input type='submit' value='ارسال کامنت' name='post_comment'>
    </p>
</form>

";

?>



<script>
 
function showReplyForm(self) {
    var commentId = self.getAttribute("data-id");
    if (document.getElementById("form-" + commentId).style.display == "") {
        document.getElementById("form-" + commentId).style.display = "none";
    } else {
        document.getElementById("form-" + commentId).style.display = "";
    }
}

 
function showReplyForReplyForm(self) {
    var commentId = self.getAttribute("data-id");
    var name = self.getAttribute("data-name");
 
    if (document.getElementById("form-" + commentId).style.display == "") {
        document.getElementById("form-" + commentId).style.display = "none";
    } else {
        document.getElementById("form-" + commentId).style.display = "";
    }
 
    document.querySelector("#form-" + commentId + " textarea[name=comment]").value = "@" + name;
    document.getElementById("form-" + commentId).scrollIntoView();
}
 
</script>
