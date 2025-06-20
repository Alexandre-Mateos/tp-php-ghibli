<?php
$ghibliLocations = file_get_contents('https://ghibliapi.vercel.app/locations/');
$arrayLocation = json_decode($ghibliLocations, true);
var_dump($arrayLocation);
?>
<!doctype html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
</head>
<body>
<div class="row">


      <?php foreach ($arrayLocation as $location) : ?>
            <div class="col-md-3">
            <p>Nom : <?php echo $location['name'] ?></p>
            <p>Climat : <?php echo $location['climate'] ?></p>
            <p>Terrain : <?php echo $location['terrain'] ?></p>
            <p>Above sea level : <?php echo $location['surface_water'] ?>m</p>
            </div>
      <?php endforeach; ?>
</div>
</body>
</html>
