<?php

session_start();

include 'rentalheader.php';

include '../connection.php';

$id=$_GET['id'];
$total=$_GET['total'];



    $qr="insert into payment(bid,amount)values('$id','$total')";
    // echo $qr;
    $sr=mysqli_query($con,$qr);
    $qr1="update bookcar set statas='accepted' where id='$id'";
    // echo $qr1;
    $sr1=mysqli_query($con,$qr1);
    if($sr){

        echo '<script>alert("Bill Added");</script>';
        echo '<script>location.href="mybookings.php"</script>';

    }else{

        echo '<script>alert(" Something went wrong ");</script>';

    }
       
           
      

     

