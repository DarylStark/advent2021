<?php
    // Array with days and their correct calendar numbers
    $beers = array(
        array(16, 'https://untappd.com/b/brouwerij-de-glazen-toren-ondineke-oilsjtersen-tripel/460', 'Belgian Tripel', '', 'Belgie', 'De eerste! Ik hoop dat ie smaakt'),
        array(21, 'https://untappd.com/b/de-heeren-van-bisde-bisde-quadrupel/3009013', 'Belgian Quadrupel', 'Gelderland', 'Nederland', ''),
        array(7, 'https://untappd.com/b/folkingebrew-out-of-space/4503658', 'IPA - Triple New England / Hazy', 'Groningen', 'Nederland', ''),
        array(30, 'https://untappd.com/b/brouwerij-diggelfjoer-fryske-imperial-stout-2020/3969552', 'Stout - Russian Imperial', 'Friesland', 'Nederland', ''),
        array(28, 'https://untappd.com/b/brouwerij-bjuster-quadrupel/4267817', 'Belgian Quadrupel', 'Friesland', 'Nederland', ''),
        array(4, 'https://untappd.com/b/brouwerij-stijl-nieuw-land-weizen/4329589', 'Wheat Beer', 'Flevoland', 'Nederland', 'Deze scoorde echt veel beter toen ik hem kocht :-('),
        array(20, 'https://untappd.com/b/dot-brew-maui/4197156', 'Farmhouse Ale - Saison', '', 'Ierland', ''),
        array(8, 'https://untappd.com/b/abbazia-tre-fontane-sinergia-21/4279268', 'Belgian Double', '', 'Italie', ''),
        array(29, 'https://untappd.com/b/brouwerij-barelds-and-sabel-hitsige-hennie/2822225', 'Belgian Blonde', 'Drenthe', 'Nederland', 'Helaas is dit de enige die ik kon vinden van Drenthe die je nog niet gehad hebt en ook nog goed scoort. Drenthe was echt lastig!'),
        array(12, 'https://untappd.com/b/brouwerij-bliksem-the-hop-alliance-part-3/4467718', 'IPA - Imperial / Double', 'Noord Brabant', 'Nederland', ''),
        array(5, 'https://untappd.com/b/brouwerij-puuro-ome-willie-oet-brazilie-barrel-aged/3577746', 'Barleywine - English', 'Limburg', 'Nederland', ''),
        array(27, 'https://untappd.com/b/brasserie-de-l-abbaye-des-rocs-abbaye-des-rocs-brune-1979/14891', 'Belgian Strong Dark Ale', '', 'Belgie', ''),
        array(14, 'https://untappd.com/b/rauw-brouwers-neipaard/4175841', 'IPA - New England / Hazy', 'Noord Holland', 'Nederland', ''),
        array(13, 'https://untappd.com/b/fightstreet-brewery-n-diquen-black-ipa-v2/4463154', 'IPA - Black / Cascadian Dark Ale', 'Gelderland', 'Nederland', ''),
        array(1, 'https://untappd.com/b/dutch-bargain-zastrugi/4557672', 'IPA - International', 'Zeeland', 'Nederland', ''),
        array(19, 'https://untappd.com/b/brouwerij-frontaal-concrete-jungle/4234459', 'IPA - Imperial / Double New England / Hazy', 'Noord Brabant', 'Nederland', ''),
        array(22, 'https://untappd.com/b/vijfheeren-bier-vijfheeren-bier-tripel/4411758', 'Belgian Tripel', 'Gelderland', 'Nederland', ''),
        array(15, 'https://untappd.com/b/100-watt-brewery-voltage-assemblage-ba/4446421', 'Stout - Imperial / Double', 'Noord Brabant', 'Nederland', ''),
        array(3, 'https://untappd.com/b/brouwerij-t-verzet-mash-of-the-titans-aged-on-jamaican-rum-barrels/4402651', 'Barleywine - Other', '', 'Belgie', ''),
        array(11, 'https://untappd.com/b/zuyd-craft-earl-s-peachtea-ale/4398345', 'IPA - White', 'Limburg', 'Nederland', ''),
        array(24, 'https://untappd.com/b/poolside-brewing-fine-by-me/4182794', 'IPA - New England / Hazy', 'Noord Holland', 'Nederland', ''),
        array(6, 'https://untappd.com/b/floem-fortune-favors-the-brave/4400180', 'IPA - Imperial / Double New England / Hazy', 'Groningen', 'Nederland', ''),
        array(18, 'https://untappd.com/b/iv-uur-bomber/4488195', 'Belgian Tripel', 'Overijssel', 'Nederland', ''),
        array(10, 'https://untappd.com/b/brouwerij-emelisse-white-label-chocolate-stout-maple-syrup-ba-2021/4556273', 'Stout - Russian Imperial', 'Zeeland', 'Nederland', ':-O deze heb je pas gehad! Maar dat zag ik helaas te laat :-('),
        array(23, 'https://untappd.com/b/kompaan-dutch-craft-beer-company-blubberdikkejetser-5-orange-chocolate/4243891', 'Stout - Imperial / Double Pastry', 'Zuid Holland', 'Nederland', ''),
        array(2, 'https://untappd.com/b/berghoeve-brouwerij-vat-54-uut-eerder-tied-barrel-aged-pedro-ximenez-sherry/4516628', 'Barleywine - English', 'Overijssel', 'Nederland', ''),
        array(26, 'https://untappd.com/b/brouwerij-maximus-circus-maximus-monkey-python/4159599', 'Brett Beer', 'Utrecht', 'Nederland', ''),
        array(25, 'https://untappd.com/b/brouwerij-de-praght-flevoboy/4182800', 'Belgian Blonde', 'Flevoland', 'Nederland', ''),
        array(17, 'https://untappd.com/b/rock-city-brewing-second-date-turquoise-edition/4496920', 'IPA - Imperial / Double', 'Utrecht', 'Nederland', ''),
        array(9, 'https://untappd.com/b/stadshaven-brouwerij-piranha-tripel/4310246', 'Belgian Tripel', 'Zuid Holland', 'Nederland', ''),
        array(31, 'https://untappd.com/b/the-wild-mill-the-wild-mill-px/4044365', 'Belgian Strong Dark Ale', 'Noord Brabant', 'Nederland', '')
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
            'link' => $beer[1],
            'style' => $beer[2],
            'province' => $beer[3],
            'country' => $beer[4],
            'notes' => $beer[5]
        );

        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    } else {
        // Beer requested for the future, we don't allow that
        http_response_code(404);
    }
?>
