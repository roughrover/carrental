<?php

session_start();

include 'userheader.php';

include '../connection.php';

$uid = $_GET['id'];

?>


<center>
    <form action="" method="post" style="margin-top:130px; margin-bottom:20px">
        <select name="cat" class="btn btn-dark" id="" required>
            <option value="" selected disabled>Select Segment</option>
            <option value="premium">Premium Cars</option>
            <option value="budget">Budget Cars</option>
        </select>
        <input type="submit" value="Filter" name="submit" class="btn btn-primary">
    </form>
    <table class="table table-secondary table-striped table-hover">

        <tr>
            <th>ID</th>
            <th>Model</th>
            <th>Vehicle No</th>
            <th>Colour</th>
            <th>Fuel</th>
            <th>Seating Capacity</th>
            <th>Other Details</th>
            <th>Image</th>
            <th>Rate Per Day</th>
            <th></th>
            <th></th>


        </tr>
        <?php
        if (isset($_POST['submit'])) {
            $cat = $_POST['cat'];
            if($cat == "premium"){
                $qry  = "select * from vehicle where uid='$uid' and statas='available' AND `rate`>=10000";
            }else{
                $qry  = "select * from vehicle where uid='$uid' and statas='available' AND `rate`<10000";
            }
        } else {
            $qry = "select * from vehicle where uid='$uid' and statas='available'";
        }
        $res = mysqli_query($con, $qry);
        while ($row = mysqli_fetch_array($res)) {
            echo '<tr>
          
      <td>' . $row['id'] . '</td>
      <td>' . $row['model'] . '</td>
      <td>' . $row['vno'] . '</td>
      <td>' . $row['color'] . '</td>
      <td>' . $row['fuel'] . '</td>
      <td>' . $row['seats'] . '</td>
      <td>' . $row['desc'] . '</td>
      <td><img src="' . $row['proof'] . '" height=150px;width=150px;></td>
      <td>' . $row['rate'] . '</td>
          <td><a href=bookcar.php?id=' . $row['id'] . ' class="btn btn-primary">Book Car</a></td>
        
      </tr>';
        }
        ?>
    </table>
</center>



<?php

include 'footer.php';

?>