<?php
require_once('lib.php'); // Yeu cau thu vien lib

  $files = array();
  $zip_name = ''; // Zip file
  $base_url = 'http://localhost/CompressImage/';

  if(isset($_POST['file_submit'])){
    $data_length = count($_FILES['img']['name']); // Dem so luong file upload
    $percent = $_POST['percent']; // Phan tram giam

    for($i = 0 ; $i < $data_length ; $i++){
      //$im = imagecreatefromjpeg($_FILES['img']['tmp_name'][$i]); // Hien tai chi ho tro JPG

      $type = $_FILES['img']['type'][$i];

      if($type != 'image/jpeg' && $type != 'image/png'){
        continue;
      } // Neu// Neu khong phai la anh thi bo qua khong phai la anh thi bo qua

      switch ($type) {
        case 'image/jpeg':
          $im = imagecreatefromjpeg($_FILES['img']['tmp_name'][$i]); // Tao anh jpg
          break;
        case 'image/png':
          $im = imagecreatefrompng($_FILES['img']['tmp_name'][$i]); // Tao anh png
          break;
      }

      imagejpeg($im, $_FILES['img']['name'][$i], $percent); // Giam 50% chat luong hinh anh

      $files[] = $_FILES['img']['name'][$i];

      imagedestroy($im);
    }

    $zip_name = get_random_key(); // Lay ten file zip

    create_zip($files, $zip_name);

    delete_img($files); // Xoa anh

    die(json_encode(array('Link' => $base_url.$zip_name.'.zip'))); // tra ve link download
  } // Neu co hinh anh
 ?>
