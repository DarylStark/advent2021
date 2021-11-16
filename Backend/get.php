<?php
    // Array with days and their correct calendar numbers
    $beers = array(
        1, 2, 3, 4, 5, 6, 7, 8, 9, 10,
        11, 12, 13, 14, 15, 16, 17, 18, 19, 20,
        21, 22, 23, 24, 25, 26, 27, 28, 29, 30,
        31
    );

    // Get the requested day
    $day = $_GET['day'];
    $today = date("d");

    // Check if it is valid
    if ($day == 'today' || $day <= $today || $day == '') {
        // Requested beer is allowed. Display the beer
        if ($day == 'today' || $day == '') {
            $day = $today;
        }
        $beer = $beers[$day - 1];
        if ($beer < 10) {
            echo '0';
        }
        echo $beer;
    } else {
        // Wrong beer requested
        http_response_code(404);
    }
?>
