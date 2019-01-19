<!DOCTYPE html>
<html dir="rtl">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="CSS/AHB.css">
    <script type="text/javascript" src="javas.js" ></script>
    <script type="text/javascript" src="JavaScript/jQuery.js"></script>
    <script type="text/javascript" src="JavaScript/AHB.js"></script>
    <script type="text/javascript" src="backend/js.js"></script>
    <?php include 'funphp.php'; ?>
    <style media="screen">
      html{
        padding: 0;
        margin: 0;
        border: 0;
      }
      body{
        padding: 0;
        margin: 0;
        border: 0;
      }
    </style>
    <title></title>
  </head>
  <body>
    <div class="rel">
    <!--shaeb-->
    <div class="header">
      <div class="logo">
        <h1 align="center" style="color:white; font-size:2.4vw">LOGO</h1>
        <!--Site Logo goes here-->
      </div>
      <div class="search-container">
        <div class="search-button">
          <script type="text/javascript">
          CreateButton('<img src="sersh.png" alt="search"/>',"dark search-butt");
          </script>
        </div>
        <div class="search-bar">
          <script type="text/javascript">
          CL("search","البحث عن إعلان ...");
          </script>
        </div>
      </div>
      <div class="button-container">
        <script type="text/javascript">
        CreateButton("إضافة إعلان","dark add-ad");
        </script>
      </div>
      <div class="sign-up-in">
        <?php if(!isset($_COOKIE["id"])){ ?>
        <span><a href="#">تسجيل دخول/إنشاء حساب</a></span>
      <?php }else {?>
        <span><a href="#"> <img src="userpic/<?php echo $_COOKIE["id"]; ?>.jpg" alt=""></a></span>

      <?php } ?>
      </div>
    </div>




    <div class="main-container" id="main"><!--show products-->


      <?php
      $selp = mysqli_query($conn,"SELECT * FROM prod LIMIT 20");
        if(mysqli_num_rows($selp) > 0){
          while ($row = mysqli_fetch_array($selp)) {
            $i=$row["id"];
            $up=mysqli_query($conn,"SELECT u_id FROM userprod WHERE p_id = $i ");
            while ($rw = mysqli_fetch_array($up)) {
              $des=$row['descrotion'];
              $r=$rw['u_id'];
              echo '<script type="text/javascript">addmaker("prodpic/'.$i.'0.jpg","prodlink.php?link='.$i.'","'.$des.'","userpic/'.$r.'.jpg");</script>';
            }
          }

        }
        ?>
<!--<script type="text/javascript">
  for (var i = 0; i < 18; i++) {
    var
    x=Math.floor(Math.random()*3);
    if(x==0)
    addmaker("/home/lipc/Desktop/1.jpeg","http://www.google.com","مواصفات المنتج","/home/lipc/Documents/index.png");
    if(x==1)
    addmaker("/home/lipc/Desktop/brozain.png","http://www.google.com","مواصفات المنتج","/home/lipc/Documents/index.png");
    if(x==2)
    addmaker("/home/lipc/Desktop/999999-711719504412.jpg","http://www.google.com","مواصفات المنتج","/home/lipc/Documents/index.png");
    if(x==3)
    addmaker("/home/lipc/Desktop/index.jpeg","http://www.google.com","مواصفات المنتج","/home/lipc/Documents/index.png");
    console.log(x);
  }
</script>-->
</div>
<div class="menu-container" >

  <script type="text/javascript">

     menu("الصفحة الرئيسية","http://www.google.com","/home/lipc/Documents/home.png");
     list("السعر","p");
     </script>
     <div class="price" id="p">
       الحد الاعلى
       <input type="text" name="" value="" class="txt" placeholder="$" id="hi" >
       <br>
       الحد لادنى
       <input type="text" name="" value="" class="txt" placeholder="$" id="lo" >

       <input type="button" name="" value=" تحقق" onclick="loadmore()">
     </div>
     <script type="text/javascript">
     menu("موبايلات","http://www.google.com","/home/lipc/Documents/mob.png");
     menu("سيارات","http://www.google.com","/home/lipc/Documents/car.png");
     menu("لابتوبات","http://www.google.com","/home/lipc/Documents/lab.png");
     menu("ملبوسات","http://www.google.com","/home/lipc/Documents/al.png");
     menu("اثاث","http://www.google.com","/home/lipc/Documents/sofa.png");
  </script>
</div>


</div>
<footer class="foot">
  <div class="footer">
  <div class="foot-top-div">
  <section class="section">
    <h6>من نحنُ</h6>
      <a href="#">عن .....</a>
      <a href="#">.... للأعمال</a>
      <a href="#">شيء</a>
      <a href="#">شيء</a>
  </section>
  <section class="section">
    <h6>مساعدة</h6>
      <a href="#">الأسئلة المكررة</a>
      <a href="#">الكفالة</a>
  </section>
  <section class="section">
    <h6>عن الموقع</h6>
      <a href="#">خريطة الموقع</a>
  </section>
  <section class="section">
    <h6>ابق على تواصل</h6>
    <img src="/home/lipc/Documents/for work/f.png" alt="Facebook">
    <img src="/home/lipc/Documents/for work/t.png" alt="Twitter">
    <img src="/home/lipc/Documents/for work/w.png" alt="WhatsApp">
    <img src="/home/lipc/Documents/for work/e.png"  alt="Email">
  </section>
  </div>
  <hr>
    <p><span dir="ltr">&copy; Copyright 2018 something.com. All rights reserved.</span></p>
  </div>
</footer>
  </body>
</html>
