<?php
    // Array with days and their correct calendar numbers
    $beers = array(
        array(16, 'https://untappd.com/b/brouwerij-de-glazen-toren-ondineke-oilsjtersen-tripel/460'),
        array(21, 'https://untappd.com/b/de-heeren-van-bisde-bisde-quadrupel/3009013'),
        array(7, 'https://untappd.com/b/folkingebrew-out-of-space/4503658'),
        array(30, 'https://untappd.com/b/brouwerij-diggelfjoer-fryske-imperial-stout-2020/3969552'),
        array(28, 'https://untappd.com/b/brouwerij-bjuster-quadrupel/4267817'),
        array(4, 'https://untappd.com/b/brouwerij-stijl-nieuw-land-weizen/4329589'),
        array(20, 'https://untappd.com/b/dot-brew-maui/4197156'),
        array(8, 'https://untappd.com/b/abbazia-tre-fontane-sinergia-21/4279268'),
        array(29, 'https://untappd.com/b/brouwerij-barelds-and-sabel-hitsige-hennie/2822225'),
        array(12, 'https://untappd.com/b/brouwerij-bliksem-the-hop-alliance-part-3/4467718'),
        array(5, 'https://untappd.com/b/brouwerij-puuro-ome-willie-oet-brazilie-barrel-aged/3577746'),
        array(27, 'https://untappd.com/b/brasserie-de-l-abbaye-des-rocs-abbaye-des-rocs-brune-1979/14891'),
        array(14, 'https://untappd.com/b/rauw-brouwers-neipaard/4175841'),
        array(13, 'https://untappd.com/b/fightstreet-brewery-n-diquen-black-ipa-v2/4463154'),
        array(1, 'https://untappd.com/b/dutch-bargain-zastrugi/4557672'),
        array(19, 'https://untappd.com/b/brouwerij-frontaal-concrete-jungle/4234459'),
        array(22, 'https://untappd.com/b/vijfheeren-bier-vijfheeren-bier-tripel/4411758'),
        array(15, 'https://untappd.com/b/100-watt-brewery-voltage-assemblage-ba/4446421'),
        array(3, 'https://untappd.com/b/brouwerij-t-verzet-mash-of-the-titans-aged-on-jamaican-rum-barrels/4402651'),
        array(11, 'https://untappd.com/b/zuyd-craft-earl-s-peachtea-ale/4398345'),
        array(24, 'https://untappd.com/b/poolside-brewing-fine-by-me/4182794'),
        array(6, 'https://untappd.com/b/floem-fortune-favors-the-brave/4400180'),
        array(18, 'https://untappd.com/b/iv-uur-bomber/4488195'),
        array(10, 'https://untappd.com/b/brouwerij-emelisse-white-label-chocolate-stout-maple-syrup-ba-2021/4556273'),
        array(23, 'https://untappd.com/b/kompaan-dutch-craft-beer-company-blubberdikkejetser-5-orange-chocolate/4243891'),
        array(2, 'https://untappd.com/b/berghoeve-brouwerij-vat-54-uut-eerder-tied-barrel-aged-pedro-ximenez-sherry/4516628'),
        array(26, 'https://untappd.com/b/brouwerij-maximus-circus-maximus-monkey-python/4159599'),
        array(25, 'https://untappd.com/b/brouwerij-de-praght-flevoboy/4182800'),
        array(17, 'https://untappd.com/b/rock-city-brewing-second-date-turquoise-edition/4496920'),
        array(9, 'https://untappd.com/b/stadshaven-brouwerij-piranha-tripel/4310246'),
        array(31, 'https://untappd.com/b/the-wild-mill-the-wild-mill-px/4044365')
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
