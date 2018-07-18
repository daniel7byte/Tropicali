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

  $query = $mysql->query('UPDATE storage SET description="'.$_POST['description'].'", priority="'.$_POST['priority'].'"  WHERE id="'.$_POST['id'].'"');

  if($query) header('location: storage.php');