<?php

session_start();

include 'rentalheader.php';

include '../connection.php';

$id=$_GET['id'];

?>


<center>

<table  class="table table-secondary table-striped table-hover" style="margin-top:30px;"> 
      
      <tr>
          <th>ID</th>
          <th>Date</th>
          <th>Description</th>
          

          
      </tr>
      <?php
      $qry="SELECT * FROM accident where bid='$id'";
    //   echo $qry;
      $res=mysqli_query($con,$qry);
      while($row=mysqli_fetch_array($res))
      {
      echo '<tr>
          
          <td>'.$row['id'].'</td>
          <td>'.$row['dt'].'</td>
          <td>'.$row['des'].'</td>
       
        
      </tr>';
      }
      ?>
  </table>
</center>



<?php

include 'footer.php';

?>