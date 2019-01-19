<!--sign up not verified
-->

<?php
include 'funphp.php';
if(phone($_POST['ph'])){
  if (emailver($_POST['email'])) {
    // code...

  $d=addver($_POST["fname"],$_POST["lname"],$_POST["email"],$_POST["pass"],$_POST["ph"],$_POST["gen"]);

  $file_name = $_FILES['f']['name'];
  $file_size =$_FILES['f']['size'];
  $file_tmp =$_FILES['f']['tmp_name'];
  $file_type=$_FILES['f']['type'];
  $target_file = "userpic/" . basename($_FILES["f"]["name"]);
  $file_ext=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $expensions= array("jpeg","jpg","png");
  if(in_array($file_ext,$expensions)=== false){
     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
  }
  if($file_size > 2097152){
     $errors[]='File size must be less than 2 MB';
  }
  if(empty($errors)==true){
     move_uploaded_file($file_tmp,"userpic/".$d.".jpg");
     echo "Success";
     echo $d;

  }
  else{
     print_r($errors);
  }
  header('Location: ver.php');
}
else {
  echo "please insert valid information";
}
}
else {
  echo "please insert valid information";
}
 ?>
