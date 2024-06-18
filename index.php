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
            <div class="row border p-4">
                <div class="col-2">
                    <h6>Parking</h6>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>-</option>
                        <option value="true">Yes</option>
                        <option value="false">No</option>
                    </select>
                </div>
                <!-- <div class="col-2">
                    <h6>Vote</h6>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div> -->
            </div>

            <!-- ----- TABLE ----- -->
            <h1 class="mt-4">Hotels</h1>
            <table class="table table-bordered">
                <thead>
                    <?php 
                        echo "<tr>";
                        foreach($hotels[0] as $key => $hotel){
                            echo "<th>" . str_replace("_", " ", ucfirst($key)) . "</th>";
                        };
                        echo "</tr>";
                    ?>
                </thead>
                <tbody>
                    <?php 
                        foreach($hotels as $hotel){
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