<!--signup
-->

<?php
if(isset($_COOKIE["id"])){
  header('Location: index.php');
}
echo '
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="up.php" method="post" enctype="multipart/form-data">
      picture:
      <input type="file" name="f"><br>
      first name:<br>
      <input type="text" name="fname" value="">
      <br>
      last name:
      <input type="text" name="lname" value="">
      <br>
      email:
      <br>
      <input type="text" name="email" value="">
      <br>
      password:
      <input type="password" name="pass" value="">
      <br>
      gender:
      <br>
      mail:
      <input type="radio" name="gen" value="0">
      <br>
      femail:
      <input type="radio" name="gen" value="1">
      <br>
      phone:+963
      <input type="text" name="ph" value="">
      <br>
      <input type="submit" name="" value="تسجيل">
    </form>
  </body>
</html>
'; ?>
