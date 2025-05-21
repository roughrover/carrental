<?php

session_start();

include 'userheader.php';

include '../connection.php';

$uid=$_SESSION['uid'];



?>


<section class="w3l-contact-11">
		<div class="form-41-mian py-5">
			<div class="container py-lg-4">
			  <div class="row align-form-map">
				
				<div class="col-lg-6 form-inner-cont">
					<div class="title-content text-left">
						<h3 class="hny-title mb-lg-5 mb-4" style="color:white">Change Password</h3>
					</div>
				  <form  method="POST" class="signin-form">
            <div class="form-input">
					  <input type="password" name="opass" id="w3lName" placeholder="Old Password" />
					</div>
                    <div class="form-input">
					  <input type="password" name="npass" id="w3lName" placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
					</div>
					
					<div class="submit-button text-lg-right">
					   <button type="submit"  name="submit" value="submit" class="btn btn-style">Submit</button>
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
          
if (isset($_POST['submit'])){



$qry="select * from login where uid='$uid' and usertype='user'";
echo $qry;
$rs=mysqli_query($con,$qry);
$r=mysqli_fetch_array($rs);
  

   $opwd=$_POST['opass'];
   $npwd=$_POST['npass'];
   
   if($opwd == $npwd){

    echo '<script>alert(" Passwords are same ");</script>';
    echo '<script>location.href="changepass.php"</script>';


   }
   if($r[3]!=$opwd){

    echo '<script>alert(" Old Password is not correct ");</script>';
    echo '<script>location.href="changepass.php"</script>';

   }else{
    $qr="update login set password='$npwd' where usertype='user' and uid='$uid'";
    echo $qr;
    $sr=mysqli_query($con,$qr);
    if($sr){

        echo '<script>alert(" Password Changed Successfully ");</script>';
        echo '<script>location.href="changepass.php"</script>';

    }else{

        echo '<script>alert(" Something went wrong ");</script>';
        echo '<script>location.href="changepass.php"</script>';

    }
   }
  
    
       
           
      

            
}
        


?>


<?php

include 'footer.php';

?>