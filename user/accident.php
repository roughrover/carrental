<?php

session_start();

include 'userheader.php';

include '../connection.php';

$uid=$_SESSION['uid'];


$id=$_GET['id'];



?>


<section class="w3l-contact-11">
		<div class="form-41-mian py-5">
			<div class="container py-lg-4">
			  <div class="row align-form-map">
				
				<div class="col-lg-6 form-inner-cont">
					<div class="title-content text-left">
						<h3 class="hny-title mb-lg-5 mb-4" style="color:white">Report</h3>
					</div>
				  <form  method="POST" class="signin-form">
               
                    <div class="form-input">
					  <textarea  name="des" id="w3lName" placeholder="Please provide the Description" ></textarea>
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


  
   $des=$_POST['des'];
   

  
    $qr="insert into accident(uid,bid,des,dt)values('$uid','$id','$des',(select cast(sysdate() as date)))";
    echo $qr;
    $sr=mysqli_query($con,$qr);
    if($sr){

        echo '<script>alert(" Reported Successfully ");</script>';
        echo '<script>location.href="mybookings.php"</script>';

    }else{

        echo '<script>alert(" Something went wrong ");</script>';
        echo '<script>location.href="search.php"</script>';

    }
       
           
      

            
}
        


?>


<?php

include 'footer.php';

?>