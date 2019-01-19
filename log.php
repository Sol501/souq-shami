<!--login
-->

<?php
  include 'funphp.php';
  session_start();

  $res=login($_POST["email"],$_POST["pass"]);
  if($res==false){
    $_SESSION["errormsg"]="please insert valid information";
    header('Location: signin.php');
  }
  else {
    $_SESSION["errormsg"]="";
    while ($rw = mysqli_fetch_array($res)) {
      setcookie("pass", $rw['passwor'], time() + (86400 * 30), "/");
      setcookie("email", $rw['email'], time() + (86400 * 30), "/");
      setcookie("id", $rw['id'], time() + (86400 * 30), "/");
      header('Location: index.php');
    }
  }
 ?>
