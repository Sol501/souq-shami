<!--logout
-->



<?php
setcookie("pass", '', time() - 3600, "/");
setcookie("email", '', time() - 3600, "/");
setcookie("id", '', time() - 3600, "/");
header('Location: signin.php');
 ?>
