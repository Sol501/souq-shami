<!--delete product function button
-->

<?php
include 'funphp.php';
if(isset($_COOKIE["id"])){
echo '<form class="" action="out.php" method="post"><input type="submit" name="su" value="logout"></form>';

  $id=$_COOKIE["id"];
  $select=mysqli_query($conn,"SELECT * FROM userprod WHERE u_id=$id");
  while ($ro = mysqli_fetch_array($select)) {
    $pid=$ro['p_id'];

    $select1=mysqli_query($conn,"SELECT * FROM prod WHERE id=$pid");
    while ($rw = mysqli_fetch_array($select1)) {
    echo '<form class="" action="delpro.php" method="post">descrotion:<br>'.$rw["descrotion"].'descrotion:<br><img src="prodpic/'.$rw["id"].'0.jpg"><br>'.'name:<br>'.$rw["price"].'<input type="hidden" name="id" value="'.$rw['id'].'">
  <input type="submit" name="su" value="delete"></form>';
}}
}
else{
header('Location: index.php');
}
  ?>
