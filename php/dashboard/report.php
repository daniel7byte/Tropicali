<?php

  session_start();
  if(!isset($_SESSION['nick'])){
    header('Location: signin.php');
    exit;
  }

  require_once("config/parameters.php");
  require_once("config/connection.php");

  $query = $mysql->prepare("INSERT INTO report_reading (id_user) VALUES (:id_user)");
  $query->execute([
      ':id_user' => $_GET['id']
  ]);

  if($query) header('location: home.php');