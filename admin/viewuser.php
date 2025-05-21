<?php
include 'adminheader.php';
include '../connection.php';
?>


<center>
    <h1>Customers</h1>
<table  class="table table-secondary table-striped table-hover" style="margin-top:30px;margin-bottom:200px;"> 
      
      <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>ADDRESS</th>
          <th>CONTACT</th>
          <th>EMAIL</th>
      </tr>
      <?php
      $qry="select * from register m,login l where l.uid=m.id and l.statas='1' and l.usertype='user'";
      $res=mysqli_query($con,$qry);
      while($row=mysqli_fetch_array($res))
      {
      echo '<tr>
          
          <td>'.$row['id'].'</td>
          <td>'.$row['name'].'</td>
          <td>'.$row['address'].'</td>
          <td>'.$row['phone'].'</td>
          <td>'.$row['email'].'</td>
      </tr>';
      }
      ?>
  </table>
</center>
<br>
<br><br><br>





