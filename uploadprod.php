<!--the form
-->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php if(!isset($_COOKIE["id"])){
      header('Location: index.php');
    } ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <!--7da e5len mo null-->
      picture:<input type="file" name="f[]" multiple>
      name: <input type="text" name="name" value="">
      price:<input type="text" name="price" value="">
      description:
      <textarea name="des" rows="8" cols="80"></textarea>
      city:<select class="" name="city">
        <option value="1">c1</option>
        <option value="2">c2</option>
        </select>
        cat:
        <select class="" name="cat">
          <option value="1">cat1</option>
          <option value="2">cat2</option>
        </select>
        <input type="submit" name="submit" value="">

    </form>
  </body>
</html>
