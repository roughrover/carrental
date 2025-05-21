<?php

session_start();

include 'commonheader.php';

include 'connection.php';

?>


<section class="w3l-contact-11 " style="margin:auto">
		<div class="form-41-mian py-5 ">
			<div class="container py-lg-4 ">
			  <div class="row align-form-map">
				
				<div class="col-lg-6 form-inner-cont" style="margin: auto;">
					<div class="title-content text-left">
						<h3 class="hny-title mb-lg-5 mb-4 text-center text-light">Login</h3>
					</div>
				  <form  method="POST" class="signin-form">
					<div class="form-input">
					  <input type="text" name="email" id="w3lName" placeholder="User Name" />
					</div>
                    <div class="form-input">
					  <input type="password" name="pass" id="w3lName" placeholder="Password" />
					</div>
					
					<div class="submit-button text-lg-center">
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
  
  
   $email=$_POST['email'];
   $pwd=$_POST['pass'];
   
   $qry="select count(*) from login where lcase(username)='$email'";
   echo $qry;
   $res=mysqli_query($con,$qry);
   $row=mysqli_fetch_array($res);
   
   if($row[0]>0)
   {
    
       $qry1="select * from login where lcase(username)='$email'";
        $res1=mysqli_query($con,$qry1); 
        $row1=mysqli_fetch_array($res1);
            if($row1['password']==$pwd)
            {
                
                $_SESSION['email']=$email;
                $_SESSION['uid']=$row1['uid'];
                if($row1['statas']=='1')
                {
                    if($row1['usertype']=='admin')
                        echo '<script>location.href="admin/adminhome.php"</script>';
                    else if($row1['usertype']=='rental')
                    { 
                            echo '<script>location.href="rental/rentalhome.php"</script>';
                    }
                    else if($row1['usertype']=='user')
                    { 
                            echo '<script>location.href="user/userhome.php"</script>';
                    }
                    
                    
                    
                }
                else{
      
       echo '<script>alert(" Account inactive");</script>';
        
}
            }
            else{
      
       echo '<script>alert(" incorrect password ....");</script>';
        
}
   }
   else{
      
       echo '<script>alert(" User doesnt exist ....");</script>';
        
}
}
?>


<?php

include 'footer.php';

?>