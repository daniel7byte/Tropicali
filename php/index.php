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
  <tr>
    <td><?=date_format(date_create($row['date']), 'd-m-Y')?></td>
    <td><?=$row['title']?></td>
    <td><?=$row['description']?></td>
    <td><?=$row['type']?></td>
  </tr>
  <br>
  <?php endforeach; ?>

</body>
</html>