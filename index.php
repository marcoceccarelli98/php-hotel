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

    // FILTERS
    $filters[] = $_GET['parking']; // 0
    $filters[] = intval($_GET['vote']);    // 1


    // FILTER HOTELS FOR PARKING
    foreach($hotels as $hotel){
        foreach($hotel as $key => $value){
            // PARKING
            if($key == "parking"){
                if($filters[0] != "null"){
                    if($filters[0] === "true"){
                        if($value){
                            $parkingHotels[] = $hotel;
                        }
                    }else{
                        if(!$value){
                            $parkingHotels[] = $hotel;
                        }
                    }
                }else{
                    $parkingHotels[] = $hotel;
                }
            }
        }
    }

    // FILTER HOTELS FOR VOTE
    foreach($hotels as $hotel){
        foreach($hotel as $key => $value){
            // VOTE
            if($key == "vote"){
                if($filters[1] != "null"){
                    if($filters[1] <= $value){                       
                        $voteHotels[] = $hotel;                       
                    }
                }else{
                    $voteHotels[] = $hotel;
                }
            }
        }
    }

    // MERGE FILTERS
    foreach ($parkingHotels as $hotel1) {
        foreach ($voteHotels as $hotel2) {
            if ($hotel1["name"] === $hotel2["name"]) {
                $filtHotels[] = $hotel1;
                break;
            }
        }
    }

    // $filtHotels = array_intersect($parkingHotels,$voteHotels);
    
    // foreach($filtHotels as $key => $hotel){
    //     echo $hotel;
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Hotel</title>
</head>
    <body class="vh-100 d-flex">
        <div class="container m-auto">
            <!-- ----- FILTERS ----- -->
            <h2>Filters</h2>
            <form class="row align-items-end border p-4">
                <div class="col-2">
                    <h6>Parking</h6>
                    <select name="parking" class="form-select" aria-label="Default select example">
                        <option value="null" selected>-</option>
                        <option value="true">Yes</option>
                        <option value="false">No</option>
                    </select>
                </div>

                <div class="col-2">
                    <h6>Vote</h6>
                    <select name="vote" class="form-select" aria-label="Default select example">
                        <option value="null" selected>-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary">Filter</button>
                </div>
            </form>

            <!-- ----- TABLE ----- -->
            <h1 class="mt-4">Hotels</h1>
            <table class="table table-bordered">
                <thead>
                    <?php 
                        echo "<tr>";
                        foreach($filtHotels[0] as $key => $hotel){
                            echo "<th>" . str_replace("_", " ", ucfirst($key)) . "</th>";
                        };
                        echo "</tr>";
                    ?>
                </thead>
                <tbody>
                    <?php 
                        foreach($filtHotels as $hotel){
                            echo "<tr>";
                            foreach($hotel as $key => $value){
                                if($key == "parking"){
                                    if($value == true){
                                        echo "<td> Yes </td>";
                                    }else{
                                        echo "<td> No </td>";
                                    }
                                }else{
                                    echo "<td> $value </td>";
                                }
                            };
                            echo "</tr>";
                        };
                    ?>
                </tbody>
            </table>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    </html>