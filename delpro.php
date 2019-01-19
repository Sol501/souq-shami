<!-- delete product from database
-->

<?php
include 'funphp.php';
    if (isset($_POST["su"])){
      echo "string";
      $id=$_POST['id'];
  $q0=mysqli_query($conn,"SELECT * FROM prod WHERE id=$id");
  while ($rw = mysqli_fetch_array($q0)) {
    $img=$rw['imgs'];

    for($i=0;$i<=$img;$i++){
      $filename='prodpic/'.$id.$i.'.jpg';
      unlink($filename);
    }
  }

  $q=mysqli_query($conn,"DELETE FROM prod WHERE id=$id");
  $q1=mysqli_query($conn,"DELETE FROM userprod WHERE p_id=$id");
}
header('Location: managepr.php');
 ?>
