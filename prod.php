<!--show the page of the product
-->

<?php
  include 'funphp.php';
  $d=$_GET["x"];
  $select=mysqli_query($conn,"SELECT * FROM prod WHERE id=$d");
  $sel2=mysqli_query($conn,"SELECT * FROM cityprod WHERE p_id=$d");
  $sel3=mysqli_query($conn,"SELECT * FROM catprod WHERE p_id=$d");
  $sel4=mysqli_query($conn,"SELECT * FROM userprod WHERE p_id=$d");
  $sel5=mysqli_query($conn,"SELECT * FROM comment WHERE p_id=$d");
  $tmpid=0;
  $tmpimg=0;
  while ($rw = mysqli_fetch_array($select)) {
    $wiwi=$rw["width"];
    echo 'descrotion:<br>'.$rw["descrotion"].'descrotion:<br><img src="prodpic/'.$rw["id"].'0.jpg"><br>'.'name:<br>'.$rw["NAME"].'<br>price:<br>'.$rw["price"].'<br>الشهرة<br>'.$rw["width"];
$tmpid=$rw['id'];
$tmpimg=$rw['imgs'];
  }
  for($i=1;$i<=$tmpimg;$i++){
    echo '<br><img src="prodpic/'.$tmpid.$i.'.jpg">';
  }
  while ($rw = mysqli_fetch_array($sel2)) {
    $t=$rw["c_id"];
    $tq=mysqli_query($conn,"SELECT * FROM city WHERE id=$t");

    while($tt=mysqli_fetch_array($tq)){
    echo "<br>city:<br>".$tt["NAME"];
  }
  }
  while ($rw = mysqli_fetch_array($sel3)) {
    $t=$rw["c_id"];
    $tq=mysqli_query($conn,"SELECT * FROM cat WHERE id=$t");

    while($tt=mysqli_fetch_array($tq)){
    echo "<br>category:<br>".$tt["NAME"];
  }
  }
  while ($rw = mysqli_fetch_array($sel4)) {
    $t=$rw["u_id"];
    $tq=mysqli_query($conn,"SELECT * FROM user WHERE id=$t");

    while($tt=mysqli_fetch_array($tq)){
    echo "<br>owner:<br>".$tt["f_name"]." ".$tt["l_name"];
  }
  }
  while ($rw = mysqli_fetch_array($sel5)) {
    $t=$rw["u_id"];
    $t2=$rw["com"];
    $tq=mysqli_query($conn,"SELECT * FROM user WHERE id=$t");

    while($tt=mysqli_fetch_array($tq)){
    echo "<br>comment:<br>".$tt["f_name"]." ".$tt["l_name"]." comment ".$t2;
  }
  }
  if(isset($_COOKIE["id"])) {
    echo '<br>add comment: <form class="" action="upcomm.php" method="post">
      <textarea name="comm" rows="8" cols="80"></textarea>
      <input type="hidden" name="pid" value="'.$d.'">
      <input type="submit" name="submit" value="comment">
    </form>';

    echo '<form class="" action="addwi.php" method="post"><input type="hidden" name="pid" value="'.$d.'">
    <input type="hidden" name="wi" value="'.$wiwi.'"><input type="submit" name="comment" value="like"></form>';
    echo '<br><form class="" action="upre.php" method="post">
      <input type="hidden" name="pid" value="'.$d.'">
      <input type="hidden" name="uid" value="'.$_COOKIE["id"].'">
      description:<input type="text" name="des" value="">
      <br>
      <input type="submit" name="submit" value="report">
    </form>';
  }
  else{
    echo "<br>you need to sighn in to add comment";
  }
?>
