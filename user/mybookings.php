<?php

session_start();

include 'userheader.php';

include '../connection.php';

$uid=$_SESSION['uid'];

?>




  <center>

    <table  class="table table-secondary table-striped table-hover" style="width:100%"> 
      
    <tr>
      <th>ID</th>
      <th>Model</th>
      <th>Vehicle No</th>
      <th>Rental</th>
      <th>Contact</th>
      <th>Image</th>
      <th>Date From</th>
      <th>Date To</th>
      <th>Total Days</th>
      <th>Rate</th>
      <th>Total Amount</th>
      <th>Description</th>
      <th>Extra Driven Rate</th>
      <th>Statas</th>
      <th></th>
      <th></th>
      <th></th>
      
      
    </tr>
    <?php
      $qry="SELECT * FROM vehicle v,bookcar b,rentalregister r WHERE v.id=b.cid AND v.uid=r.id AND b.uid='$uid' ORDER BY b.id DESC";
        // echo $qry;
      $res=mysqli_query($con,$qry);
      while($row=mysqli_fetch_array($res))
      {
        echo '<tr>
        
        <td>'.$row['id'].'</td>
        <td>'.$row['model'].'</td>
        <td>'.$row['vno'].'</td>
        <td>'.$row['name'].'</td>
        <td>'.$row['phone'].'</td>
        <td><img src="'.$row[6].'" height=150px;width=150px;></td>
        <td>'.$row['fdt'].'</td>
        <td>'.$row['tdt'].'</td>
        <td>'.$row['days'].'</td>
        <td>'.$row['rate'].'</td>
        <td>'.$row['total'].'</td>
        <td>'.$row['des'].'</td>
        <td>'.$row['forkm'].'</td>
        <td>'.$row['statas'].'</td>';
        
        if($row['statas']=='accepted'){
          
          echo   '<td><a class="btn btn-success" href="pay.php?id='.$row[11].'">Pay</a></td>';
          
        }
        if($row['statas']=='paid'){
          
          echo   '<td><a class="btn btn-info" href="review.php?id='.$row[11].'">ADD Review</a></td>';
          echo   '<td><a class="btn btn-warning" href="accident.php?id='.$row[11].'">Report Accident if Any</a></td>';
          echo   '<td><a class="btn btn-info" href="bill.php?id='.$row[11].'">Generate Bill</a></td>';
          
        }
        echo '</tr>';
      }
      ?>
  </table>
  
  
  
</center>
  
<?php

include 'footer.php';

?>