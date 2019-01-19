<!--signin
-->

<?php
  include 'funphp.php';
    session_start();
  if(isset($_COOKIE["id"])){
    header('Location: index.php');
  }
  else {
    $pass="";
    $email="";
  }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form class="" action="log.php" method="post">
       <?php if (isset($_SESSION["errormsg"])) {
         echo $_SESSION["errormsg"];
       } ?>
       email:
       <input type="text" name="email" value=<?php echo $email; ?>>
       password:
       <input type="password" name="pass" value=<?php echo $pass; ?>>
       <input type="submit" name="" value="تسجيل الدخول">
     </form>
   </body>
 </html>
