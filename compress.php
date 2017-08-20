<?php
require_once('lib.php'); // Yeu cau thu vien lib

  $files = array();

  if(isset($_POST['file_submit'])){
    $data_length = count($_FILES['img']['name']); // Dem so luong file upload
    $percent = $_POST['percent']; // Phan tram giam

    for($i = 0 ; $i < $data_length ; $i++){
      $im = imagecreatefromjpeg($_FILES['img']['tmp_name'][$i]); // Hien tai chi ho tro JPG

      imagejpeg($im, $_FILES['img']['name'][$i], $percent); // Giam 50% chat luong hinh anh

      $file[] = $_FILES['img']['name'][$i];

      imagedestroy($im);
    }

    $zip_name = get_random_key(); // Lay ten file zip

    create_zip($file, $zip_name);

    delete_img($file); // Xoa anh 

    echo 'Thanh cong';
  }
 ?>
