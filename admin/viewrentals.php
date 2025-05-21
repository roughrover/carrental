<?php
include 'adminheader.php';
include '../connection.php';
?>

<style>
    h1 {
        color: white;
    }
</style>

<center>
    <h1>Non Approoved</h1>
    
    <table class="table table-secondary table-striped table-hover" style="margin-top:100px;margin-bottom:100px;">

        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>License No</th>
            <th>CONTACT</th>
            <th>EMAIL</th>
            <th>Proof</th>
        </tr>
        <?php
        $qry = "select * from rentalregister m,login l where l.uid=m.id and l.statas='0' and l.usertype='rental'";
        $res = mysqli_query($con, $qry);
        while ($row = mysqli_fetch_array($res)) {
            echo '<tr>
          
      <td>' . $row['id'] . '</td>
      <td>' . $row['name'] . '</td>
      <td>' . $row['license'] . '</td>
      <td>' . $row['phone'] . '</td>
      <td>' . $row['email'] . '</td>
      <td><img src="../' . $row['proof'] . '" height=150px;width=150px;></td>
          <td><a href=approoveuser.php?id=' . $row[9] . ' class="btn btn-success">Approve</a></td>
      </tr>';
        }
        ?>
    </table>
</center>



<center>
    <h1>Approoved</h1>
    <form action="" method="get" class="d-flex">
        <select id="district-select" name="district" class="form-control">
            <option value="alappuzha">Alappuzha</option>
            <option value="ernakulam">Ernakulam</option>
            <option value="idukki">Idukki</option>
            <option value="kannur">Kannur</option>
            <option value="kasaragod">Kasaragod</option>
            <option value="kollam">Kollam</option>
            <option value="kottayam">Kottayam</option>
            <option value="kozhikode">Kozhikode</option>
            <option value="malappuram">Malappuram</option>
            <option value="palakkad">Palakkad</option>
            <option value="pathanamthitta">Pathanamthitta</option>
            <option value="thrissur">Thrissur</option>
            <option value="thiruvananthapuram">Thiruvananthapuram</option>
            <option value="wayanad">Wayanad</option>
        </select>
        <input type="submit" value="Filter" name="filter" class="btn btn-primary">
    </form>
    <table class="table table-secondary table-striped table-hover" style="margin-top:60px;">

        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>License No</th>
            <th>CONTACT</th>
            <th>EMAIL</th>
            <th>Proof</th>
        </tr>
        <?php
        if(isset($_GET['filter'])){
            $district = $_GET['district'];
            $qry = "select * from rentalregister m,login l where l.uid=m.id and l.statas='1' and l.usertype='rental' and m.`district`='$district'";
        }else{

            $qry = "select * from rentalregister m,login l where l.uid=m.id and l.statas='1' and l.usertype='rental'";
        }
        $res = mysqli_query($con, $qry);
        while ($row = mysqli_fetch_array($res)) {
            echo '<tr>
          
          <td>' . $row['id'] . '</td>
          <td>' . $row['name'] . '</td>
          <td>' . $row['license'] . '</td>
          <td>' . $row['phone'] . '</td>
          <td>' . $row['email'] . '</td>
          <td><img src="../' . $row['proof'] . '" height=150px;width=150px;></td>
          <td><a href=blockuser.php?id=' . $row[9] . ' class="btn btn-warning">Block</a></td>
          <td><a href=deleteuser.php?id=' . $row[9] . '  class="btn btn-danger">Delete</a></td>
      </tr>';
        }
        ?>
    </table>
</center>