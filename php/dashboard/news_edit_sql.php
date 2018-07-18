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

  $query = $mysql->query('UPDATE news SET title="'.$_POST['title'].'", description="'.$_POST['description'].'", type="'.$_POST['type'].'" WHERE id="'.$_POST['id'].'"');

  if($query) header('location: news.php');