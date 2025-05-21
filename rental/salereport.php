<?php

session_start();

include 'rentalheader.php';

include '../connection.php';

$uid=$_SESSION['uid'];



?>


<section class="w3l-contact-11">
		<div class="form-41-mian py-5">
			<div class="container py-lg-4">
			  <div class="row align-form-map">
				
				<div class="col-lg-6 form-inner-cont">
					<div class="title-content text-left">
						<h3 class="hny-title mb-lg-5 mb-4" style="color:white">Select Range</h3>
					</div>
				  <form  method="POST" class="signin-form">
                  <div class="form-input">
					  <input type="date" name="fdt" id="w3lName" placeholder="From Date" />
					</div>
                    <div class="form-input">
					  <input type="date" name="tdt" id="w3lName" placeholder="To Date" />
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

if(isset($_POST['submit']))
{

$fdt=$_POST['fdt'];
$tdt=$_POST['tdt'];

?>    
<center>
<table  class="table table-secondary table-striped table-hover" > 
      
      <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Date</th>
          <th>Price</th>
      </tr>
      <?php
      $qry1="SELECT SUM(p.amount) AS tp FROM payment p,bookcar t,register c,vehicle v WHERE p.`bid`=t.id AND t.cid=v.`id` AND t.uid=c.`id` AND v.uid='2' AND p.`dt` BETWEEN '$fdt' AND '$tdt'";
      $res1=mysqli_query($con,$qry1);
      $sum=mysqli_fetch_array($res1);
      $qry="SELECT * FROM payment p,bookcar t,register c,vehicle v WHERE p.`bid`=t.id AND t.cid=v.`id` AND t.uid=c.`id` AND v.uid='$uid' AND p.`dt` BETWEEN  '$fdt' AND '$tdt'";
    //   echo $qry;
      $res=mysqli_query($con,$qry);
      while($row=mysqli_fetch_array($res))
      {
      echo '<tr>
          
          <td>'.$row['id'].'</td>
          <td>'.$row['name'].'</td>
          <td>'.$row['phone'].'</td>
          <td>'.$row['dt'].'</td>
          <td>'.$row['amount'].'</td>
      </tr>';
      }
      ?>
  </table>
</center>

<h1 style="color:white;"><?php echo $sum['tp'] ?></h1>

<?php

    }


?>

<?php

include 'footer.php';

?>