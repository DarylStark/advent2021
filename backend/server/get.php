<?php
    // Array with days and their correct calendar numbers
    $beers = array(
        array(1, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(2, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(3, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(4, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(5, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(6, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(7, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(8, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(9, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(10, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(11, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(12, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(13, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(14, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(15, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(16, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(17, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(18, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(19, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(20, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(21, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(22, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(23, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(24, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(25, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(26, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(27, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(28, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(29, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(30, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487'),
        array(31, 'https://untappd.com/b/st-servattumus-speltbier-weizen/2238487')
    );

    // Get the requested day
    $day = $_GET['day'];
    $today = date("d");

    // Check if it is valid
    if ($day == 'today' || ($day <= $today && $day > 0) || $day == '') {
        // Requested beer is allowed. Display the beer
        if ($day == 'today' || $day == '') {
            $day = $today;
        }
        $beer = $beers[$day - 1];
        
        $data = array(
            'beer' => $beer[0],
            'link' => $beer[1]
        );

        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    } else {
        // Beer requested for the future, we don't allow that
        http_response_code(404);
    }
?>
