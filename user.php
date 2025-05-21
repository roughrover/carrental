<?php

include 'commonheader.php';
include 'connection.php';

?>


<section class="w3l-contact-11">
  <div class="form-41-mian py-5">
    <div class="container py-lg-4">
      <div class="row align-form-map">

        <div class="col-lg-6 form-inner-cont">
          <div class="title-content text-left">
            <h3 class="hny-title mb-lg-5 mb-4">User Register</h3>
          </div>
          <form method="POST" class="signin-form">
            <div class="form-input">
              <input type="text" name="name" id="w3lName" pattern="[A-Za-z\s]+" placeholder="Name" />
            </div>
            <div class="form-input">
              <input type="text" name="email" id="w3lName" placeholder="Email" />
            </div>
            <div class="form-input">
              <input type="text" name="phone" id="w3lName" pattern="[6789][0-9]{9}" maxlength="10"
                placeholder="Phone" />
            </div>
            <div class="form-input">
              <textarea name="addr" id="w3lName" placeholder="Address"></textarea>
            </div>
            <div class="form-input">
              <input type="password" name="pass" id="w3lName" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                placeholder="Password" />
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

  $name = $_POST['name'];
  $email = $_POST['email'];
  $addr = $_POST['addr'];
  $phone = $_POST['phone'];
  $pass = $_POST['pass'];


  $qry = "select count(*) from login where lcase(username)='$email'";

  //    echo $qry;
  $res = mysqli_query($con, $qry);
  $row = mysqli_fetch_array($res);

  if ($row[0] == 0) {
    $qry = "insert into register(name,address,email,phone)values('$name','$addr','$email','$phone')";
    echo $qry;
    $res = mysqli_query($con, $qry);
    if ($res) {
      $qry1 = "insert into login (uid,username,password,usertype,statas) values((select max(id) from register),'$email','$pass','user','1')";
      $res1 = mysqli_query($con, $qry1);
      echo $qry1;
      if ($res1) {
        echo '<script>alert(" Registration successfull.");</script>';
        echo '<script>location.href="user.php"</script>';
      } else {
        echo '<script>alert(" Sorry some error occured");</script>';

      }

    } else {

      echo '<script>alert(" Registration failed");</script>';

    }


  } else {

    echo '<script>alert(" User already registered ....");</script>';

  }



}

?>



<?php

include 'footer.php';

?>