<?php

  session_start();
  if(!isset($_SESSION['nick'])){
    header('Location: signin.php');
    exit;
  }

  if($_SESSION['role'] != "ADMIN"){
    header('Location: 403.php');
    exit;
  }

  require_once("config/parameters.php");
  require_once("config/connection.php");

  $options = [
    'cost' => 12,
  ];

  $hash = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

  $query = $mysql->query('UPDATE users SET password="'.$hash.'" WHERE id="'.$_POST['id'].'"');

  if($query) header('location: my_account.php');