<!--show profile of a user
-->

<?php
include 'funphp.php';
  $id=$_GET["x"];
  $up=mysqli_query($conn,"SELECT p_id FROM userprod WHERE u_id = $id ");
  $up1=mysqli_query($conn,"SELECT * FROM user WHERE id = $id ");
    while ($rw = mysqli_fetch_array($up1)){
      echo "name: ".$rw["f_name"]." ".$rw["l_name"]."<br><br>";
    }
    while ($rw = mysqli_fetch_array($up)){
      $id2=$rw["p_id"];
      $up2=mysqli_query($conn,"SELECT * FROM prod WHERE id = $id2 ");
      while ($rww = mysqli_fetch_array($up2)){
        echo "product:".$rww["NAME"]."<br>";
      }
    }

 ?>
