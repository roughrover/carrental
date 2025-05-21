<?php

session_start();

include 'rentalheader.php';

include '../connection.php';

$uid = $_SESSION['uid'];




?>


<section class="w3l-contact-11">
  <div class="form-41-mian py-5">
    <div class="container py-lg-4">
      <div class="row align-form-map">

        <div class="col-lg-6 form-inner-cont">
          <div class="title-content text-center">
            <h3 class="hny-title mb-lg-5 mb-4" style="color:white">Cars</h3>
          </div>
          <center>

            <form method="POST" class="signin-form" enctype="multipart/form-data">
              <div class="form-input">
                <input type="text" name="model" id="w3lName" placeholder="Model Name" />
              </div>
              <div class="form-input">
                <input type="text" name="vno" id="w3lName" placeholder="Vehicle No" />
              </div>
              <div class="form-input">
                <input type="text" name="color" id="w3lName" placeholder="Color" />
              </div>
              <div class="form-input">
                <input type="number" name="seat" id="w3lName" placeholder="Seat Capacity" />
              </div>
              <div class="form-input">
                <select class="form-control" name="fuel">
                <option selected disabled>Select Fuel Type</option>
                <option value="petrol">Petrol</option>
                <option value="diesal">Diesal</option>
              </select>
            </div>
            <div class="form-input">
              <textarea name="desc" id="w3lName" placeholder="Other Details" ></textarea>
            </div>
            <div class="form-input">
              <input type="number" name="rate" id="w3lName" placeholder="Rate per day" />
            </div>
            <div class="form-input">
              <input type="file" name="file" id="w3lName" placeholder="Proof" required />
            </div>
            
            
            <div class="submit-button text-lg-right">
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


<center>

  <table class="table table-secondary table-striped table-hover" style="margin-top:60px;">

    <tr>
      <th>ID</th>
      <th>Model</th>
      <th>Vehicle No</th>
      <th>Colour</th>
      <th>Fuel</th>
      <th>Seating Capacity</th>
      <th>Other Details</th>
      <th>Driven KM</th>
      <th>Image</th>
      <th>Rate Per Day</th>
      <th>Status</th>
      <th></th>

    </tr>
    <?php
    $qry = "select * from vehicle where uid='$uid'";
    $res = mysqli_query($con, $qry);
    while ($row = mysqli_fetch_array($res)) {
      $vid = $row['id'];
      $qryDrv = "SELECT * FROM `driven` WHERE `vid`='$vid'";
      $resDrv = mysqli_query($con, $qryDrv);
      $count = mysqli_num_rows($resDrv);
      if($count > 0){
        $rowDrv = mysqli_fetch_array($resDrv);
        $drive = "<a href='updateDriven.php?id=$rowDrv[did]&of=old' class='btn btn-warning'>$rowDrv[kms]</a>";
      }else{
        $drive = "<a href='updateDriven.php?id=$row[id]&of=new' class='btn btn-warning'>Add Drive Km</a>";
      }
      echo '<tr>
          
          <td>' . $row['id'] . '</td>
          <td>' . $row['model'] . '</td>
          <td>' . $row['vno'] . '</td>
          <td>' . $row['color'] . '</td>
          <td>' . $row['fuel'] . '</td>
          <td>' . $row['seats'] . '</td>
          <td>' . $row['desc'] . '</td>
          <td>' . $drive . '</td>
          <td><img src="' . $row['proof'] . '" height=150px;width=150px;></td>
          <td>' . $row['rate'] . '</td>
          <td>' . $row['statas'] . '</td>
          <td><a class="btn btn-info" href=updatecar.php?id=' . $row['id'] . '>Update</a></td>
          <td><a class="btn btn-info" href=changecarstat.php?id=' . $row['id'] . '&stat=' . $row['statas'] . '>Change Statas</a></td>
        
      </tr>';
    }
    ?>
  </table>
</center>



<?php

if (isset($_POST['submit'])) {



  $model = $_POST['model'];
  $vno = $_POST['vno'];
  $color = $_POST['color'];
  $fuel = $_POST['fuel'];
  $rate = $_POST['rate'];
  $seat = $_POST['seat'];
  $desc = $_POST['desc'];


  $folder = '../assets/images/';
  $file = $folder . basename($_FILES['file']['name']);
  move_uploaded_file($_FILES['file']['tmp_name'], $file);


  $qr = "insert into `vehicle`(`uid`,`model`,`vno`,`color`,`fuel`,`proof`,`rate`,`seats`,`desc`)values('$uid','$model','$vno','$color','$fuel','$file','$rate','$seat','$desc')";
  echo $qr;
  $sr = mysqli_query($con, $qr);
  if ($sr) {

    echo '<script>alert("car added successfully");</script>';
    echo '<script>location.href="addcars.php"</script>';

  } else {

    echo '<script>alert(" Something went wrong ");</script>';

  }





}



?>


<?php

include 'footer.php';

?>