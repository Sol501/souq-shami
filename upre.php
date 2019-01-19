<!--report
-->

<?php
include 'funphp.php';
  if (!isset($_COOKIE["id"])) {
  header('Location: index.php');
  }
  else {
    $des=$_POST['des'];
    $u=$_POST['uid'];
    $p=$_POST['pid'];
    echo $des.$u.$p;
    $insert=mysqli_query($conn,"INSERT into report (des,u_id,p_id) VALUES ('$des',$u,$p)");
    die("connection failed" .mysqli_error($conn));
    //header('Location: done.php');
  }
 ?>
