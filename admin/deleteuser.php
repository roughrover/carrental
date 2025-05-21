<?php
include '../connection.php';

$id=$_GET['id'];

$qry="delete from  login  where id='$id' and usertype='rental'";

echo $qry;


$res=mysqli_query($con,$qry);

if($res){

    echo '<script>alert("Deleted Succesfully")</script>';

    echo '<script>window.location="viewrentals.php"</script>';

}else{

    echo '<script>alert("Something Went Wrong")</script>';

}




?>