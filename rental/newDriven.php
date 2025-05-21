<?php

session_start();

include 'rentalheader.php';

include '../connection.php';

$uid=$_SESSION['uid'];
$vid = $_GET['id'];
$bid = $_GET['bid'];
$days = $_GET['days'];

$qryDrv = "SELECT * FROM `driven` WHERE `vid`='$vid'";
$resDrv = mysqli_query($con,$qryDrv);
$rowDrv = mysqli_fetch_array($resDrv);

$dayKm = $rowDrv['daylimit'];

$totalDaysKm = $dayKm * $days;
$oldKm = $rowDrv['kms'];
$rate = $rowDrv['rpk'];
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
            <h3 class="hny-title mb-lg-5 mb-4" style="color:white">Cars Trip Details</h3>
          </div>
          <center>

            <form method="POST" class="signin-form" enctype="multipart/form-data">

              <div class="form-input">
                <input type="number" name="kms" id="w3lName" placeholder="KM Driven Total" title="KM Driven" />
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
    $kms = $_POST['kms'];
    $query = "UPDATE `driven` SET `kms`='$kms' WHERE `vid`='$vid'";
    $forRes = mysqli_query($con,$query);
   $netDrv = $kms - $oldKm;
   $totalNet = $kms * $days;
   if($totalDaysKm > $netDrv) {
    $query = "UPDATE `bookcar` SET `forkm`='0' WHERE `id`='$bid'";
}else{
    $net = $netDrv - $totalDaysKm;
    $tot = $net * $rate;
    // echo $tot;
    $query = "UPDATE `bookcar` SET `forkm`='$tot' WHERE `id`='$bid'";

   }
  $sr = mysqli_query($con, $query);
  if ($sr) {

    echo '<script>alert("car driven details updated");</script>';
    echo '<script>location.href="completed.php"</script>';

  } else {

    echo '<script>alert(" Something went wrong ");</script>';

  }





}



?>


<?php

include 'footer.php';

?>