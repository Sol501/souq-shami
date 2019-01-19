<?php
include '\funphp.php';
$obj = json_decode($_GET["x"], false);
$a3=$obj->des;
$a4=$obj->cat;
$q="SELECT prod.id, userprod.u_id, prod.descrotion,catprod.c_id
FROM prod
INNER JOIN userprod ON prod.id=userprod.p_id
INNER JOIN catprod ON prod.id=catprod.p_id
WHERE catprod.c_id=$a4
ORDER BY $a3
LIMIT 20" ;
$result = mysqli_query($conn,$q);
$outp = array();
$outp=mysqli_fetch_all($result,MYSQLI_ASSOC);
json_encode($outp);
echo json_encode($outp);
?>
