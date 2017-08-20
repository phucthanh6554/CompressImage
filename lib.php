<?php
  function get_random_key(){

    $secret_key = 'Day la mot chuoi bi mat nao do';
    $seg1 = date('Y-m-d h-i-s');
    $seg2 = rand(1,1000);
    $seg3 = substr($secret_key, rand(0, strlen($secret_key)));

    $hash = sha1($seg1.$seg2.$seg3);

    return $hash;
  } // Tao mot ma hash khong trung khop

  function create_zip($files, $zip_name){
    //$zip_name = get_random_key();

    $zip = new ZipArchive();
    $zip->open($zip_name.'.zip', ZipArchive::CREATE);

    foreach($files as $file_path){
      $zip->addFile($file_path, $file_path);
    }

    $zip->close();
  }

  function delete_img($file){
    foreach($file as $data){
      unlink($data);
    }
  }
 ?>
