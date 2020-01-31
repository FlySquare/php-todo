<?php
try{
    $db=new PDO("mysql:host=localhost;dbname=phptodo;charset=utf8",'umut','asdasd');
}catch(PDOExpception $e){
    echo  $e->getMessage();
}
?>