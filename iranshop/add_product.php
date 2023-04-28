<?php


$product=array('p_name'=>'کیس گیمینگ cooler master','price'=>56000000,'count'=>5,
'mboard'=>'TUF GAMING B760M-PLUS','cpu'=>'intel core i7 12gen',
'gpu'=>'rtx 2080 6GB','ram'=>'16GB' ,'status'=>'available','p_image'=>'p2.png');

    $pname=$product['p_name'];
    $price=$product['price'];
    $count=$product['count'];
     
    $mboard=$product['mboard'];
    $cpu=$product['cpu'];
    $gpu=$product['gpu'];
    $ram=$product['ram'];
    $status=$product['status'];
    $p_image=$product['p_image'];

    include 'db.php';
    
    $sql = "INSERT INTO `products`(`id`, `p_name`, `price`, `count`, `mother_board`, `cpu`, `gpu`, `ram`, `status`, `p_image`)
     VALUES (null,'$pname','$price','$count','$mboard','$cpu','$gpu','$ram','$status','$p_image');
    ";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    ?>
    

     

