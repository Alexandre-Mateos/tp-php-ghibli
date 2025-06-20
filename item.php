<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<?php if (!isset($_GET['film_id'])) : ?>

      <?php echo "Désolé ce film n'existe pas"; ?>
    <a href="index.php" class="btn btn-primary">Retour à l'accueil</a>

<?php else : ?>

<?php $ghibli = file_get_contents('https://ghibliapi.vercel.app/films/' . $_GET['film_id']);
$ghibliArray = json_decode($ghibli, true);
//var_dump($ghibliArray);
?>

<body>
<?php include 'header.php';?>
<div class="container">
<h1 class="text-center pt-2"> <?php echo $ghibliArray['title'] ?></h1>
<section>
      <p class="text-center"><?php echo $ghibliArray['original_title'] ?></p>
      <h2>Description :</h2>
      <div class="d-flex flex-row py-4">
            <img src="<?php echo $ghibliArray['image'] ?>">
            <div class="container fs-5 px-5">
                  <p><?php echo $ghibliArray['description'] ?></p>
                  <p>Running time : <?php echo $ghibliArray['running_time'] ?> min</p>
                  <p>Release date : <?php echo $ghibliArray['release_date'] ?></p>
                  <p>Director : <?php echo $ghibliArray['director'] ?></p>
                  <p>Producer : <?php echo $ghibliArray['producer'] ?></p>
                  <p><?php echo $ghibliArray['rt_score'] ?>% on Rotten Tomatoes</p>
            </div>
      </div>
</section>
<section>
      <h2>Characters :</h2>
      <ul>
            <?php foreach ($ghibliArray['people'] as $characterLink) : ?>
                  <?php
                  $characterInfo = file_get_contents($characterLink);
                  $characterArray = json_decode($characterInfo, true);
//                  var_dump($characterArray);
                  ?>
                  <?php if(strlen($characterArray['gender']) > 0) : ?>
                        <li><?php echo $characterArray['name'] ?> (<?php echo $characterArray['age']?> ans, <?php echo $characterArray['gender']?>)</li>
                  <?php else : ?>
                        <li><?php echo $characterArray['name'] ?> (<?php $characterArray['age']?> ans)</li>
                  <?php endif; ?>
            <?php endforeach; ?>
      </ul>


</section>
</div>

</body>
</html>
<?php endif; ?>
