<?php

session_start();

include 'rentalheader.php';

include '../connection.php';

$uid=$_SESSION['uid'];

?>


<center>

<table  class="table table-secondary table-striped table-hover" style="margin-top:30px;"> 
      
      <tr>
          <th>ID</th>
          <th>Model</th>
          <th>Vehicle No</th>
          <th>Rental</th>
          <th>Contact</th>
          <th>Image</th>
          <th>Date From</th>
          <th>Date To</th>
          <th>Description</th>
          <th>Driven</th>
          <th>Statas</th>

          
      </tr>
      <?php
      $currentDate = date("Y-m-d");
      
      $qry="SELECT * FROM vehicle v,bookcar b,register r WHERE v.id=b.cid AND r.id=b.uid AND v.uid='$uid' AND b.statas!='requested' AND b.statas!='rejected' AND b.`tdt` < '$currentDate'";
      // echo $qry;
      $res=mysqli_query($con,$qry);
      $i = 0;
      while($row=mysqli_fetch_array($res))
      {
        $bid = $row[11];
        $qryAcc = "SELECT * FROM `accident` WHERE `bid`='$bid'";
        $resAcc = mysqli_query($con,$qryAcc);
        $countAcc = mysqli_num_rows($resAcc);
        if($countAcc > 0){
          $class = "btn btn-danger";
        }else{
          $class = "btn btn-info";
        }
        if($row['forkm'] == null){
            $km = "<a href='newDriven.php?id=$row[0]&bid=$bid&days=$row[days]' class='btn btn-warning'>Add Km</a>";
        }else{
            $km = $row['forkm'];
        }
      echo '<tr>
          
          <td>'.++$i.'</td>
          <td>'.$row['model'].'</td>
          <td>'.$row['vno'].'</td>
          <td>'.$row['name'].'</td>
          <td>'.$row['phone'].'</td>
          <td><img src="'.$row[6].'" height=100px;width=100px;></td>
          <td>'.$row['fdt'].'</td>
          <td>'.$row['tdt'].'</td>
          <td>'.$row['des'].'</td>
          <td>'.$km.'</td>
          <td>'.$row['statas'].'</td>';

          if($row['statas']=='paid'){

           echo '<td><a class="btn btn-info" href=viewlocation.php?id='.$row[11].'>View Location</a></td>';

           echo "<td><a class='$class' href=viewacreport.php?id=$row[11]>Accident Reported</a></td>";

           echo '<td><a class="btn btn-info" href=viewreview.php?id='.$row[11].'>Reviews</a></td>';

          }
    
      echo '</tr>';
      }
      ?>
  </table>
</center>



<?php

include 'footer.php';

?>