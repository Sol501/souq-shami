<!--upload comment
-->

<?php
include 'funphp.php';
  if (isset($_POST["submit"])){
    if(isset($_COOKIE["id"])){
      $pid=$_POST["pid"];
      $comm=$_POST["comm"];
      $uid=$_COOKIE["id"];
      addcomm($comm,$pid,$uid);
      header('Location: /project/prod.php?x='.$pid.'');
    }
  }
 ?>
