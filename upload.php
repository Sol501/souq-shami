<!--upload product
-->

<?php
    include 'funphp.php';

    if (isset($_POST["submit"])) {

      if(isset($_COOKIE["id"])){
        $cou=count($_FILES['f']['name']);
        $cou-=1;
        if($cou>9){
          $cou=9;
        }
      $d=addprod( $_POST["name"] ,$_POST["price"],$_POST["des"],$_POST["city"],$_POST["cat"],$_COOKIE["id"],$cou);
      $nn=0;
      foreach($_FILES['f']['name'] as $key=>$val){

      $file_name = $_FILES['f']['name'][$key];
      $file_size =$_FILES['f']['size'][$key];
      $file_tmp =$_FILES['f']['tmp_name'][$key];
      $file_type=$_FILES['f']['type'][$key];
      $target_file = "prodpic/" . basename($_FILES["f"]["name"][$key]);
      $file_ext=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $expensions= array("jpeg","jpg","png");
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      if($file_size > 2097152){
         $errors[]='File size must be less than 2 MB';
      }
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"prodpic/".$d.$nn.".jpg");
         $nn+=1;
         echo "Success";
         echo $d;
         if($nn==10){
           break;
         }
      }
      else{
         print_r($errors);
      }
    }
      header('Location: done.php');
    }
    }
 ?>
