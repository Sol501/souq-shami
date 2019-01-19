<?php
include '\funphp.php';
$obj = json_decode($_GET["x"], false);
$a1=$obj->l;
$a2=$obj->h;
$a3=$obj->lim;
$q="SELECT prod.id, userprod.u_id, prod.descrotion
FROM prod
INNER JOIN userprod ON prod.id=userprod.p_id
WHERE Price BETWEEN $a1 AND $a2
LIMIT $a3" ;
$result = mysqli_query($conn,$q);
$outp = array();
$outp=mysqli_fetch_all($result,MYSQLI_ASSOC);
json_encode($outp);
echo json_encode($outp);
?>
