<?php

session_start();

include 'rentalheader.php';

include '../connection.php';

$id = $_GET['id'];

$qry = "select * from vehicle where id='$id'";
$res = mysqli_query($con, $qry);
$rs = mysqli_fetch_array($res);

?>


<section class="w3l-contact-11">
  <div class="form-41-mian py-5">
    <div class="container py-lg-4">
      <div class="row align-form-map">

        <div class="col-lg-6 form-inner-cont">
          <div class="title-content text-left">
            <h3 class="hny-title mb-lg-5 mb-4" style="color:white">Cars</h3>
          </div>
          <form method="POST" class="signin-form" enctype="multipart/form-data">
            <div class="form-input">
              <input type="text" name="model" id="w3lName" placeholder="Model Name" value=<?php echo $rs['model'] ?> />
            </div>
            <div class="form-input">
              <input type="text" name="vno" id="w3lName" placeholder="Vehicle No" value=<?php echo $rs['vno'] ?> />
            </div>
            <div class="form-input">
              <input type="text" name="color" id="w3lName" placeholder="Color" value=<?php echo $rs['color'] ?> />
            </div>
            <div class="form-input">
              <select class="form-control" name="fuel">
                <option selected disabled>Select Fuel Type</option>
                <option value="petrol">Petrol</option>
                <option value="diesal">Diesal</option>
              </select>
            </div>
            <div class="form-input">
              <input type="number" name="rate" id="w3lName" placeholder="Rate per day" value=<?php echo $rs['rate'] ?> />
            </div>
            <div class="form-input">
              <input type="file" name="file" id="w3lName" placeholder="Proof" required />
            </div>


            <div class="submit-button text-lg-right">
              <button type="submit" name="submit" value="submit" class="btn btn-style">Submit</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<br>
<br>



<?php

if (isset($_POST['submit'])) {



  $model = $_POST['model'];
  $vno = $_POST['vno'];
  $color = $_POST['color'];
  $fuel = $_POST['fuel'];
  $rate = $_POST['rate'];


  $folder = '../assets/images/';
  $file = $folder . basename($_FILES['file']['name']);
  move_uploaded_file($_FILES['file']['tmp_name'], $file);


  $qr = "update vehicle set model='$model',vno='$vno',color='$color',fuel='$fuel',proof='$file', `rate`='$rate' where id='$id'";
  echo $qr;
  $sr = mysqli_query($con, $qr);
  if ($sr) {

    echo '<script>alert("car updated successfull");</script>';
    echo '<script>location.href="addcars.php"</script>';

  } else {

    echo '<script>alert(" Something went wrong ");</script>';
    echo '<script>location.href="addcars.php"</script>';

  }





}



?>


<?php

include 'footer.php';

?>