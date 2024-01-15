<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

$parkingFilter = $_GET['parking'] ?? "all";
$voteFilter = $_GET['vote'] ?? "0";


?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<form class="mb-5">
  <h2>Filtra</h2>
  <!-- <div class="mb-3">
    <label for="parking" class="form-label">Presenza di parcheggio</label>
    <input type="checkbox" id="parking" name="parking">
  </div> -->
  <label for="parking" class="form-label">Presenza di parcheggio:</label>
  <select class="form-select form-select-lg w-25 mb-3" type="text" id="parking" name="parking">
  <option value="all">Tutti</option>
    <option value="true">Con parcheggio</option>
    <option value="false">Senza parcheggio</option>
    
  </select>
  <div class="mb-3">
    <label for="vote" class="form-label">Votazione superiore a:</label>
    <input type="number" id="vote" name="vote" value="0">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col"> Nome </th>
      <th scope="col"> Descrizione </th>
      <th scope="col"> Parcheggio </th>
      <th scope="col"> Voto </th>
      <th scope="col"> Distanza dal centro </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($hotels as $hotel){ ?>
      <tr>
        <?php foreach($hotel as $key => $element){ ?>

            <!-- <th class="fw-normal"> <?php echo $element ?> </th> -->

            
            <?php if( $parkingFilter === "all" && $voteFilter == 0 ){ ?>
              <th class="fw-normal"> <?php echo $element ?> </th>
            <?php } else{ ?>
              <?php if( $hotel['parking'] == $parkingFilter || $hotel['vote'] >= $voteFilter){ ?>
              <th><?php echo $element ?></th>
              <?php }else{}?>
            <?php } ?>

        <?php } ?>
      </tr>
    <?php } ?>
  </tbody>
</table>

<div>
  <p><?php echo $parkingFilter ?></p>
  <p><?php echo $voteFilter ?></p>
</div>

    
</body>
</html>