<?php
include '../connection.php';

$id=$_GET['id'];
$stat=$_GET['stat'];

if($stat == 'available'){

    $qry="update vehicle set statas='unavailable' where id='$id'";

}else{
    $qry="update vehicle set statas='available' where id='$id'";
}


$res=mysqli_query($con,$qry);

if($res){

    echo '<script>alert("Updated Succesfully")</script>';

    echo '<script>window.location="addcars.php"</script>';

}else{

    echo '<script>alert("Something Went Wrong")</script>';

}




?>