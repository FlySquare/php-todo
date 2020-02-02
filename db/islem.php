<?php
include('db.php');

//Rehber Ekleme
if(isset($_POST['contact'])){
  $todokaydet=$db->prepare("INSERT INTO contact_list SET
  contact_name=:contact_name,
  contact_info=:contact_info,
  contact_foto=:contact_foto"
  );
  $insert = $todokaydet->execute(array(
      "contact_name" => $_POST['contact_name'],
      "contact_info" => $_POST['contact_info'],
      "contact_foto" => $_POST['contact_foto']
  ));
  if($insert){
    header("Location:../index.php?durum=ok");
  }else{
    header("Location:../index.php?durum=no");
  }
}
//Rehber Ekleme

if(isset($_POST['task'])){
  $todokaydet=$db->prepare("INSERT INTO task_settings SET
  task_icerik=:task_icerik"
  );
  $insert = $todokaydet->execute(array(
      "task_icerik" => $_POST['task_icerik']
  ));
  if($insert){
    header("Location:../index.php?durum=ok");
  }else{
    header("Location:../index.php?durum=no");
  }
}

?>