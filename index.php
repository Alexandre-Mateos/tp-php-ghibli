<?php
$ghibli = file_get_contents('https://ghibliapi.vercel.app/films');
$arrayGhibli = json_decode($ghibli, true);
//var_dump($arrayGhibli);
?>
<?php include 'header.php';?>
<div class="container py-5">
    <div class="row">
          <?php foreach ($arrayGhibli as $movie) : ?>
              <div class="col-md-4 p-2">
                  <div class="card" style="width: 18rem;">
                      <img src="<?php echo $movie['image'] ?>" class="card-img-top" alt="...">
                      <div class="card-body">
                          <h5 class="card-title"> <?php echo $movie['title'] ?></h5>
                          <p class="card-text"><?php echo substr($movie['description'], 0, 300) . ' ...' ?></p>
                            <?php foreach ($movie['people'] as $characters) ?>
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
