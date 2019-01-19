<!--add comment to database-->

<?php
include 'funphp.php';
if (isset($_POST["comment"])){
  if(isset($_COOKIE["id"])){
    $uid=$_COOKIE["id"];
    $pid=$_POST["pid"];
    $wid=$_POST["wi"];

    $selp = mysqli_query($conn,"SELECT * FROM wiprod WHERE u_id=$uid AND p_id=$pid");

      if(mysqli_num_rows($selp) > 0){
        $wid-=1;
        $ts=mysqli_query($conn,"UPDATE prod SET width=$wid where id=$pid");

        $ts2=mysqli_query($conn,"DELETE FROM wiprod WHERE u_id=$uid AND p_id=$pid");
      }
      else{

        $wid+=1;
        $ts=mysqli_query($conn,"UPDATE prod SET width=$wid where id=$pid");

        $ts2=mysqli_query($conn,"INSERT into wiprod (u_id,p_id) VALUES ($uid,$pid)");

      }
  }
  }
  header('Location: /project/prod.php?x='.$pid.'');
?>
