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

    $data = $_GET ?? "";
    // $has_parking = $_GET ["parking"] ?? " " ;
    
    $has_parking = "" ;
    $request_vote = intval($_GET["vote"] ?? "") ;
    // var_dump($request_vote);
    $final_hotels = [];

    if (!empty($data)) {
      
      if ($_GET["parking"] === "true" ) {
        $has_parking = true;
        
      } else if ($_GET["parking"] === "false" ) {
        $has_parking = false;
        
      } else {
        $has_parking = "" ;
        
      }




      //  var_dump($data) ;
      foreach($hotels as $hotel) {
        // var_dump($has_parking) ;
        // var_dump($hotel) ;
        if ( $hotel["parking"] == $has_parking && $hotel["vote"] >= $request_vote ) {
          $final_hotels[] = $hotel ; 
        } else {
            // $final_hotels[] = "" ; 
        }
        
        
      }
    }
    
//    var_dump($final_hotels)

    
    
  
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Andrea Coggio" />
    <meta name="description" content="new exercise" />
    <!-- title -->
    <title>PHP Hotel</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <!-- custom style -->
    <link rel="stylesheet" href="./css/style.css" />
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"
        defer></script>
</head>

<body>
    <form method="GET" class="row">

        <select name="parking" class="form-select col" aria-label="Default select example">
            <option selected value=""> Vuoi un hotel con parcheggio? </option>
            <option value="true">Si</option>
            <option value="false">No</option>
        </select>
        <select name="vote" class="form-select col" aria-label="Default select example">
            <option selected value=""> A quante stelle vuoi l'hotel? </option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>

        </select>
        <button class="btn btn-success col-2" type="submit"> cerca </button>
    </form>
    <?php if(!empty($data) && !empty($final_hotels)) : ?>
    <table class="table">
        <thead>
            <tr>
                <th scoper="col">nome</th>
                <th scoper="col">descrizione</th>
                <th scoper="col">parcheggio</th>
                <th scoper="col">voto</th>
                <th scoper="col">distanza dal centro</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($final_hotels as $hotel) { ?>
            <tr>
                <?php foreach($hotel as $element) { ?>
                <td>
                    <?php
                    if ($element === true) {
                      echo "si" ;
                    } else if ($element === false) {
                      echo "no" ;
                    } else 
                     echo   $element ; 
                     ?>
                </td>
                <?php }
    } ?>
            </tr>
        </tbody>
    </table>
    <?php else : ?>
    <p>Nessun risultato corrisponde ai parametri scelti</p>
    <?php endif ; ?>

</body>

</html>