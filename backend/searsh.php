<?php
include '\funphp.php';
$obj = json_decode($_GET["x"], false);
$a=$obj->sea;
$q="SELECT prod.id, userprod.u_id, prod.descrotion,catprod.c_id
FROM prod
INNER JOIN userprod ON prod.id=userprod.p_id
WHERE NAME LIKE '%$a%'" ;
$result = mysqli_query($conn,$q);
$outp = array();
$outp=mysqli_fetch_all($result,MYSQLI_ASSOC);
json_encode($outp);
echo json_encode($outp);
?>
