<!--database and function
-->

<?php

//connection

$sn="localhost";
$un="root";
$pass="";
$conn=mysqli_connect($sn,$un,$pass);
if($conn==false){
  die("connection failed" .mysqli_error($conn));
}

//create db

if(!mysqli_query($conn,"CREATE DATABASE IF NOT EXISTS mydb")){
  die("connection failed" .mysqli_error($conn));
}
//select db

$selectdb=mysqli_select_db($conn,"mydb");
if(!$selectdb){die("connection failed" .mysqli_error($conn));}
//create tables

$creatuser=" CREATE TABLE IF NOT EXISTS user(
  id int primary key AUTO_INCREMENT,
  f_name VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci not null ,
  l_name VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci not null ,
  email VARCHAR(40) not null ,
  passwor text (20) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci not null,
  gender boolean ,
  phon varchar (12)
)";
if(!mysqli_query($conn,$creatuser)){
    die("connection failed" .mysqli_error($conn));
}
$creatcity="CREATE TABLE IF NOT EXISTS city(
  id int primary key AUTO_INCREMENT,
  NAME VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci not null
)
";
if(!mysqli_query($conn,$creatcity)){
    die("connection failed" .mysqli_error($conn));
}
$creatprod="CREATE TABLE IF NOT EXISTS prod(
  id int primary key AUTO_INCREMENT,
  NAME VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci not null,
  price float not null,
  width int ,
  dat date not null,
  imgs int ,
  descrotion text
)
";
if(!mysqli_query($conn,$creatprod)){
    die("connection failed" .mysqli_error($conn));
}
$creatcat="CREATE TABLE IF NOT EXISTS cat(
  id int primary key AUTO_INCREMENT,
  NAME VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci not null
)
";
if(!mysqli_query($conn,$creatcat)){
    die("connection failed" .mysqli_error($conn));
}
$creatuserprod="CREATE TABLE IF NOT EXISTS userprod(
  id int primary key AUTO_INCREMENT ,
  u_id int ,
  p_id int ,
  foreign key (p_id) references prod(id) ,
  foreign key (u_id) references user(id)
)
";
if(!mysqli_query($conn,$creatuserprod)){
    die("connection failed" .mysqli_error($conn));
}
$creatcityprod="CREATE TABLE IF NOT EXISTS cityprod(
  id int primary key AUTO_INCREMENT,
  c_id int ,
  p_id int ,
  foreign key (p_id) references prod(id) ,
  foreign key (c_id) references city(id)
)
";
if(!mysqli_query($conn,$creatcityprod)){
    die("connection failed" .mysqli_error($conn));
}
$creatcomments="CREATE TABLE IF NOT EXISTS comment(
  id int primary key AUTO_INCREMENT,
  com text,
  u_id int,
  p_id int ,
  foreign key (p_id) references prod(id),
  foreign key (u_id) references user(id)
)
";
if(!mysqli_query($conn,$creatcomments)){
    die("connection failed" .mysqli_error($conn));
}
$creatcatprod="CREATE TABLE IF NOT EXISTS catprod(
  id int primary key AUTO_INCREMENT,
  c_id int ,
  p_id int ,
  foreign key (p_id) references prod(id) ,
  foreign key (c_id) references cat(id)
)
";
if(!mysqli_query($conn,$creatcatprod)){
    die("connection failed" .mysqli_error($conn));
}
$creatver="CREATE TABLE IF NOT EXISTS ver(
  id int primary key AUTO_INCREMENT,
  f_name VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci not null ,
  l_name VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci not null ,
  email VARCHAR(40) not null ,
  passwor text CHARACTER SET utf8 COLLATE utf8_unicode_520_ci not null,
  gender boolean ,
  code text,
  phon varchar (12)
)";
if(!mysqli_query($conn,$creatver)){
    die("connection failed" .mysqli_error($conn));
}
$creatuw="CREATE TABLE IF NOT EXISTS wiprod(
  id int primary key AUTO_INCREMENT,
  u_id int ,
  p_id int ,
  foreign key (p_id) references prod(id) ,
  foreign key (u_id) references user(id)
)";
if(!mysqli_query($conn,$creatuw)){
    die("connection failed" .mysqli_error($conn));
}
$creatre="CREATE TABLE IF NOT EXISTS report(
  id int primary key AUTO_INCREMENT,
  des text ,
  u_id int ,
  p_id int ,
  foreign key (p_id) references prod(id) ,
  foreign key (u_id) references user(id)
)";
if(!mysqli_query($conn,$creatre)){
    die("connection failed" .mysqli_error($conn));
}
//data insert function
function chek($info){
  global $conn;
    $info = mysqli_real_escape_string($conn,$info);
    $info = trim($info);
    $info = stripslashes($info);
    $info = htmlspecialchars($info);
    if(empty($info)){
    header('Location: /project/valemail.php');
    }
  return $info;
}
function emailver($email){
  $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
    if(preg_match($regex, $email)){
      return true;
    }
  return false;
}
function phone($p)
{
  if(preg_match("/^[0-9]{9}$/", $p)) {
    return TRUE;
}
else {
  return false;
}
}
function addver($fname,$lname,$email,$pass,$phon,$gender){
  global $conn;
  $code=substr(md5(mt_rand()),0,15);
  $pass=chek($pass);
  $pass=md5($pass);
  $email = chek($email);
  $lname=chek($lname);
  $fname=chek($fname);
//email verficatio
  //if(!emailver($email))
//{header('Location: /project/valemail.php');}
  $up1=mysqli_query($conn,"SELECT * FROM user WHERE email = '$email' ");

  $up11=mysqli_query($conn,"SELECT * FROM ver WHERE email = '$email' ");

  if(mysqli_num_rows($up1) > 0){

    header('Location: /project/exist.php');
  }
  else if(mysqli_num_rows($up11) > 0){

    header('Location: /project/exist.php');
  }
else{


  $insert=mysqli_query($conn,"INSERT into ver (f_name,l_name,email,passwor,gender,code,phon) VALUES ('$fname','$lname','$email','$pass',$gender,'$code','$phon')");
  $id=mysqli_insert_id($conn);
  $from="email";//Email;
  $to=$email;
  $body="hi your code is ".$code; //edit mn sha allah
  $headers = "From:".$from;
  //mail($from,$to,$body,$headers);
  return $id;
}
}
function verified($email,$code){

  global $conn;
  $fa=false;
  chek($email);
  $select=mysqli_query($conn,"SELECT * FROM ver WHERE email='$email'");

	if(mysqli_num_rows($select)==1)
	{

		while($row=mysqli_fetch_array($select))
		{
      $id=$row['id'];
      $fname=$row['f_name'];
      $lname=$row['l_name'];
			$email=$row['email'];
			$pass=$row['passwor'];
      $gender=$row['gender'];
      $phone=$row['phon'];
      $c=$row['code'];

		}

  if(!$code==$c){header('Location: /project/ver.php');
  }
  else {
    $insert_user=mysqli_query($conn,"INSERT into user (f_name,l_name,email,passwor,gender,phon) VALUES ('$fname','$lname','$email','$pass',$gender,'$phone')");
    $dd=mysqli_insert_id($conn);
    $old="userpic/".$id.".jpg";
    $new="userpic/".$dd.".jpg";
    rename($old,$new);
		$delete=mysqli_query($conn,"DELETE from ver where id='$id' and code='$code'");
    header('Location: /project/signin.php');
  }

	}
  else {

    header('Location: /project/ver.php');
  }
}
function addprod($name,$price,$desc,$city,$cat,$user,$cou){
  global $conn;
  $name=chek($name);
  $desc=chek($desc);
  $width=0;
  $insert_prod=mysqli_query($conn,"insert into prod (NAME,price,width,descrotion,imgs,dat) VALUES ('$name',$price,$width,'$desc',$cou,now())");


  $id=mysqli_insert_id($conn);
  $n=count($cat);
  for($i=0;$i<$n;$i++){
    $insert_prodcat=mysqli_query($conn,"insert into catprod (c_id,p_id) VALUES ($cat[$i],$id)");
  }
  $insert_prodcity=mysqli_query($conn,"insert into cityprod (c_id,p_id) VALUES ($city,$id)");
  $insert_produser=mysqli_query($conn,"insert into userprod (u_id,p_id) VALUES ($user,$id)");
  return $id;
}
function addcat($name){
  $name=chek($name);
  $insert_cat=mysqli_query($conn,"insert into verify cat('','$name')");
}
function addcomm($comm,$prod,$user){
  global $conn;
  $comm=chek($comm);
  $insert_comm=mysqli_query($conn,"insert into comment (com,u_id,p_id) VALUES ('$comm','$user','$prod')");

}
function login($email,$pass){
  global $conn;
  $pass=md5(chek($pass));
  $email=chek($email);
  $select=mysqli_query($conn,"SELECT * FROM user WHERE email='$email' and passwor='$pass'");

	if(mysqli_num_rows($select)==1)
	{
    return $select;
	}
else{return false;}
}

function checkimg($id,$filePath)
{

  $image = imagecreatefrompng($filePath);
  $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
  imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
  imagealphablending($bg, TRUE);
  imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
  imagedestroy($image);
  $quality = 50; // 0 = worst / smaller file, 100 = better / bigger file
  imagejpeg($bg, $id . ".jpg", $quality);
  imagedestroy($bg);
  unlink($filePath);
}

function update($inf,$key,$id)
{
  $statment="UPDATE user SET $key='$inf' WHERE id=$id";
}













 ?>
