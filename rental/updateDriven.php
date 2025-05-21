<?php

session_start();

include 'rentalheader.php';

include '../connection.php';

$uid = $_SESSION['uid'];

$id = $_GET['id'];
$of = $_GET['of'];
if($of == 'old'){
    $qry = "SELECT * FROM `driven` WHERE `did`='$id'";
    $res = mysqli_query($con,$qry);
    $row = mysqli_fetch_array($res);
    $km = "value='$row[kms]'";
    $rp = "value='$row[rpk]'";
    $dl = "value='$row[daylimit]'";
}else{
    $km = "";
    $rp = "";
    $dl = "";

}


?>


<section class="w3l-contact-11">
  <div class="form-41-mian py-5">
    <div class="container py-lg-4">
      <div class="row align-form-map">

        <div class="col-lg-6 form-inner-cont">
          <div class="title-content text-center">
            <br>
            <br>
            <br>
            <h3 class="hny-title mb-lg-5 mb-4" style="color:white">Cars Driven Details</h3>
          </div>
          <center>

            <form method="POST" class="signin-form" enctype="multipart/form-data">
              <div class="form-input">
                <input type="number" name="rpk" id="w3lName" <?php echo $rp ?> placeholder="Rate per KM" title="Rate per KM" />
              </div>
              <div class="form-input">
                <input type="number" name="daylimit" id="w3lName" <?php echo $dl ?> placeholder="Daily Limite in KM" title="Daily Limite in KM" />
              </div>
              <div class="form-input">
                <input type="number" name="kms" id="w3lName" <?php echo $km ?> placeholder="KM Driven" title="KM Driven" />
              </div>
            <div class="submit-button text-lg-center">
              <button type="submit" name="submit" value="submit" class="btn btn-style">Submit</button>
            </div>
            
          </form>
        </center>
        </div>
      </div>
    </div>
  </div>
</section>
<br>
<br>


<?php

if (isset($_POST['submit'])) {
    $rpk = $_POST['rpk'];
    $kms = $_POST['kms'];
    $daylimit = $_POST['daylimit'];
    if($of == "old"){
        $query = "UPDATE `driven` SET `rpk`='$rpk',`kms`='$kms',`daylimit`='$daylimit' WHERE `did`='$id'";
    }else if($of == "new"){
        $query = "INSERT INTO `driven`(`rpk`,`vid`,`kms`,`date`,`daylimit`)VALUES('$rpk','$id','$kms',(SELECT SYSDATE()),'$daylimit')";
    }

  $sr = mysqli_query($con, $query);
  if ($sr) {

    echo '<script>alert("car driven details updated");</script>';
    echo '<script>location.href="addcars.php"</script>';

  } else {

    echo '<script>alert(" Something went wrong ");</script>';

  }





}



?>


<?php

include 'footer.php';

?>