<?php
  require_once "config.php";
  try{
      $connect = new PDO("mysql:host=$Host;dbname=$dataBase;",$username,$password,$set__name);
      ##echo "<div class='alert alert-success'>متصل شدید</div>";
  }
  catch (PDOException $error){
      echo "خطا در اتصال به پایگاه داده " . $error->getMessage() ;
  }
