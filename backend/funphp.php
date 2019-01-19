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
$creatver=" CREATE TABLE IF NOT EXISTS ver(
  id int primary key AUTO_INCREMENT,
  f_name VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci not null ,
  l_name VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci not null ,
  email VARCHAR(40) not null ,
  passwor text CHARACTER SET utf8 COLLATE utf8_unicode_520_ci not null,
  gender boolean ,
  code text,
  phon varchar (12)
)";
if(!mysqli_query($conn,$creatuser)){
    die("connection failed" .mysqli_error($conn));
}
//data insert function
function chek($info){
    $info = mysqli_real_escape_string($info);
    $info = trim($info);
    $info = stripslashes($info);
    $info = htmlspecialchars($info);
    if(empty($info)){
    header(/*empty page*/);
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
function addver($fname,$lname,$email,$pass,$phon,$gender){
  $code=substr(md5(mt_rand()),0,15);
  $pass=chek($pass);
  $pass=md5($pass);
  $email = chek($email);
  $lname=chek($lname);
  $fname=chek($fname);
//email verficatio
  if(!emailver($email))
{header(/*email error page*/);}
  $insert=mysqli_query("insert into verify ver('','$fname','$lname','$email','$pass','$gender','$code','$phon')");
  $from="email";//Email;
  $to=$email;
  $body="hi your code is ".$code; //edit mn sha allah
  $headers = "From:".$from;
  mail($from,$to,$body,$headers);
}
function verified($email,$code){
  $fa=false;
  chek($email);
  $select=mysqli_query("SELECT * FROM ver WHERE email='$email'");
	if(mysql_num_rows($select)==1)
	{
		while($row=mysql_fetch_array($select))
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
  if(!$code==$c){header(/*ver error page*/);}
		$insert_user=mysqli_query("insert into verify ver('','$fname','$lname','$email','$pass','$gender','$phon')");
		$delete=mysqli_query("delete from ver where id='$id' and code='$code'");
    header(/*succesful page*/);
	}
}
function addprod($name,$price,$width,$desc,$city,$cat,$user){
  $name=chek($name);
  $desc=chek($desc);
  $width=0;
  $insert_prod=mysqli_query("insert into verify prod('','$name','$price','$width','$desc')");
  $id=mysql_insert_id();
  $n=count($cat);
  for($i=0;$i<$n;$i++){
    $insert_prodcat=mysqli_query("insert into verify catprod('','$cat[$i]','$id')");
  }
  $insert_prodcity=mysqli_query("insert into verify cityprod('','$city','$id')");
  $insert_produser=mysqli_query("insert into verify userprod('','$user','$id')");
}
function addcat($name){
  $name=chek($name);
  $insert_cat=mysqli_query("insert into verify cat('','$name')");
}
function addcomm($comm,$prod,$user){
  $comm=chek($comm);
  $insert_comm=mysqli_query("insert into verify comment('','$comm','$user','$prod')");
}
function login($email,$pass){
  $pass=md5(chek($pass));
  $email=chek($email);
  $select=mysqli_query("SELECT * FROM user WHERE email='$email' and passwor=$pass");
	if(mysql_num_rows($select)==1)
	{
    return $select;
	}
else{header(/*invalid information page*/);}
}

function checkimg($id,$filePath)
{
  $filePath="1.png";
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















 ?>
