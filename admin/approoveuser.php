<?php
include '../connection.php';

$id=$_GET['id'];

$qry="update login set statas=1 where id='$id' and usertype='rental'";

echo $qry;


$res=mysqli_query($con,$qry);

if($res){

    echo '<script>alert("Approoved Succesfully")</script>';

    echo '<script>window.location="viewrentals.php"</script>';

}else{

    echo '<script>alert("Something Went Wrong")</script>';

}




?>