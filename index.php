<?php
$ghibli = file_get_contents('https://ghibliapi.vercel.app/films');
$arrayGhibli = json_decode($ghibli, true);
var_dump($arrayGhibli);
?>
<!doctype html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
      <title>Document</title>
</head>
<body>
<div class="container">
      <div class="row">
            <?php foreach ($arrayGhibli as $movie) : ?>
                  <div class="col-md-4 p-2">
                        <div class="card" style="width: 18rem;">
                              <img src="<?php echo $movie['image'] ?>" class="card-img-top" alt="...">
                              <div class="card-body">
                                    <h5 class="card-title"> <?php echo $movie['title'] ?></h5>
                                    <p class="card-text"><?php echo substr($movie['description'], 0, 300) . ' ...' ?></p>
                                    <a href="http://localhost:8080/item.php?film_id=<?php echo $movie['id'] ?>"
                                       class="btn btn-primary">Voir plus</a>
                              </div>
                        </div>
                  </div>
            <?php endforeach; ?>
      </div>
</div>
</body>
</html>
