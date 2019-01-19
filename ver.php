<!--verify account
-->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    if(isset($_COOKIE["id"])){
      header('Location: index.php');
    } ?>
    <form class="" action="verc.php" method="post">
      email:
      <input type="text" name="email" value="">
      code:
      <input type="text" name="code" value="">
      <input type="submit" name="" value="">
    </form>
  </body>
</html>
