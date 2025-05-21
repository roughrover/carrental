<?php

session_start();

include 'rentalheader.php';

include '../connection.php';

$uid = $_SESSION['uid'];

?>


<center>

  <table class="table table-secondary table-striped table-hover" style="margin-top:30px;">

    <tr>
      <th>ID</th>
      <th>Model</th>
      <th>Vehicle No</th>
      <th>Customer</th>
      <th>Contact</th>
      <th>Address</th>
      <th>Image</th>
      <th>Date From</th>
      <th>Date To</th>
      <th>Total Days</th>
      <th>Rate</th>
      <th>Total Amount</th>
      <th>Description</th>
      <th>Statas</th>
      <th>Statas</th>
      <th></th>


    </tr>
    <?php
    $qry = "SELECT * FROM vehicle v,bookcar b,register r WHERE v.id=b.cid AND r.id=b.uid AND v.uid='$uid' AND b.statas='requested'";
    // echo $qry;
    $res = mysqli_query($con, $qry);
    while ($row = mysqli_fetch_array($res)) {
      echo '<tr><td>' . $row['id'] . '</td>
      <td>' . $row['model'] . '</td>
      <td>' . $row['vno'] . '</td>
      <td>' . $row['name'] . '</td>
      <td>' . $row['phone'] . '</td>
      <td>' . $row['address'] . '</td>
      <td><img src="' . $row[6] . '" height=150px;width=150px;></td>
      <td>' . $row['fdt'] . '</td>
      <td>' . $row['tdt'] . '</td>
      <td>' . $row['days'] . '</td>
      <td>' . $row['rate'] . '</td>
      <td>' . $row['total'] . '</td>
      <td>' . $row['des'] . '</td>
      <td>' . $row['statas'] . '</td>';
      echo '
          <td><a href="acceptbook.php?id=' . $row[11] . '&total=' . $row['total'] . '" class="btn btn-success">Accept</a></td>
          <td><a href=rejectbook.php?id=' . $row[11] . ' class="btn btn-danger ">Reject</a></td> 
        
      </tr>';
    }
    ?>
  </table>
</center>



<?php

include 'footer.php';

?>