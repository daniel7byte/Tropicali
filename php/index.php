<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php

    require_once("dashboard/config/parameters.php");
    require_once("dashboard/config/connection.php");

    $query = $mysql->prepare("SELECT * FROM news WHERE type = :type ORDER BY id DESC");
    $query->execute([':type' => 'Publico']);
    $result = $query->fetchAll();

    foreach ($result as $row):
  ?>
  <ul>
    <li><?=date_format(date_create($row['date']), 'd-m-Y')?></li>
    <li><?=$row['title']?></li>
    <li><?=$row['description']?></li>
    <li><?=$row['type']?></li>
  </ul>
  <?php endforeach; ?>

</body>
</html>