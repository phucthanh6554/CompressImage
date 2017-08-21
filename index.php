<?php
  require_once('lib.php');

  auto_delete_zip(); // Goi xoa file zip
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Nén hình ảnh chất lượng cao</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
    integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
    crossorigin="anonymous">

    <style media="screen">
      .loader{
        width: 20px;
        height: 20px;
        display: none;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Demo chương trình nén ảnh bằng PHP</h1>
      <form id="upload_form" action="compress.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="img[]">Chọn file</label>
          <input type="file" name="img[]" class="form-control-file" multiple>
        </div> <!--file -->

        <div class="form-group">
          <label for="percent">Chọn chất lượng</label>
          <input type="number" name="percent" value="75" min="1" max="100" class="form-control">
        </div>

        <div class="form-group">
          <label for="">Link download </label> <img class="loader" id="loader" src="image/Spinner.gif">
          <input type="text" class="form-control" id="link_download" placeholder="Link here">
        </div>

        <div class="">
          <input type="submit" name="file_submit" id="upload_submit" value="Upload" class="btn btn-primary">
          <i id="percent_upload"></i>
        </div>
      </form>

      <h1>Lưu ý link chỉ tồn tại trong vòng 60 phút tức 1 giờ</h1>
    </div>

    <script src="upload.js">

    </script>
  </body>
</html>
