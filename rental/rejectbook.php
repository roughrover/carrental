<?php
include '../connection.php';

$id=$_GET['id'];

$qry="update bookcar set statas='rejected' where id='$id'";

echo $qry;


$res=mysqli_query($con,$qry);

if($res){

    echo '<script>alert("Rejected Succesfully")</script>';

    echo '<script>window.location="mybookings.php"</script>';

}else{

    echo '<script>alert("Something Went Wrong")</script>';

}




?>