<?php
  require_once('lib.php');

  auto_delete_zip(); // Goi xoa file zip
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Nen hinh anh chat luong cao</title>
  </head>
  <body>
    <form action="compress.php" method="post" enctype="multipart/form-data">
      <input type="file" name="img[]" multiple>
      <input type="number" name="percent" value="75" min="1" max="100">
      <input type="submit" name="file_submit" value="Upload">
    </form>
  </body>
</html>
