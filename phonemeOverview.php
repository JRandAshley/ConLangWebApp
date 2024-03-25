<?php
    include 'displayOptions.php';
    //include 'js/jquery-3.7.1.min.js';
    require 'includes/dbh.inc.php';
    session_start();

    if(isset($_GET["languageID"])) {
        $_SESSION['languageID'] = $_GET["languageID"];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Phoneme Overview Page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/conlang.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script scr="js/jquery-3.7.1.min.js"></script>
</head>
    <body class="container" style="background-color:black; margin-top:20px;">
        <?php
        $languageID = $_SESSION["languageID"];
        include "navigationBar.php";
        $displayPhonemes = array();

        //getting the phonemes for selected language
        $tsql = "select * from tblPhonemes where LanguageID='".$languageID."';";
        $stmt = sqlsrv_query($conn,$tsql);
        if($stmt == false){
            echo "Error";
        }
        else{
            while($obj = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
                $phonemeID = $obj['PhonemeID'];
                $phonemeName = $obj['PhonemeName'];
                $phonemeCategory = $obj['Category'];
                $pronNotes = $obj['PronNotes'];
                $usageNotes = $obj['UsageNotes'];
                $modifiers = $obj['Modifiers'];
                //consonant
                $voicing = NULL;
                $place = NULL;
                $manner = NUll;
                //vowel
                $height = NULL;
                $length = NULL;
                $rounding = NULL;

                if($phonemeCategory == "C"){
                    $voicing = $obj['Voicing'];
                    $place = $obj['Place'];
                    $manner = $obj['Manner'];

                    $phoneme = array(
                        "phonemeID" => $phonemeID,
                        "name" => $phonemeName,
                        "language"=> $languageID,
                        "category"=> $phonemeCategory,
                        "pronNotes"=> $pronNotes,
                        "usageNotes"=> $usageNotes,
                        "modifiers"=> $modifiers,
                        "place"=> $place,
                        "manner"=> $manner,
                        "voicing"=> $voicing
                    );
                }
                else if($phonemeCategory == "V"){
                    $height = $obj['Height'];
                    $length = $obj['VLength'];
                    $rounding = $obj['Rounding'];

                    $phoneme = array(
                        "phonemeID" => $phonemeID,
                        "name" => $phonemeName,
                        "language"=> $languageID,
                        "category"=> $phonemeCategory,
                        "pronNotes"=> $pronNotes,
                        "usageNotes"=> $usageNotes,
                        "modifiers"=> $modifiers,
                        "height"=> $height,
                        "length"=> $length,
                        "rounding"=> $rounding
                    );
                }
                $displayPhonemes[] = array_merge($displayPhonemes, $phoneme);//php array of language's phonemes
            }
        }
        ?>

        <h1 class="display-5 text-primary">Consonants</h1>
        <form method="get" action="phonemeForm.php">
            <input type="submit" class="btn btn-outline-primary" name="submit" value="Create New Consonant" style="margin: 10px;">
            <input type="hidden" name="phonemeType" value="C">
            <input type="hidden" name="effect" value="add">
        </form>

        <table class="table table-dark table-striped table-hover">
        <thead>
        <tr>
        <th scope="col">Symbol</th>
        <th scope="col">Name</th>
        <th scope="col">Place</th>
        <th scope="col">Manner</th>
        <th scope="col">Voicing</th>
        <th scope="col">Pronounciation</th>
        <th scope="col">Usage</th>
        <th scope="col">Modifications</th>
        <th scope="col"></th>
        <th scope="col"></th>
        </tr>
        <tbody>
        <?php
            foreach($displayPhonemes as $phoneme){
                if($phoneme["category"] == "C"){
                    $symbol = getSymbol("C", $phoneme["name"]);
                    echo "<tr>";
                        echo "<td>". $symbol ."</td>";
                        echo "<td>".$phoneme["name"]."</td>";
                        echo "<td>".$phoneme["place"]."</td>";
                        echo "<td>".$phoneme["manner"]."</td>";
                        echo "<td>".$phoneme["voicing"]."</td>";
                        echo "<td>Pronounciation</td>";
                        echo "<td>Usage</td>";
                        echo "<td>Modifications</td>";
                        echo "<form method='get' action='phonemeForm.php'>";
                            echo "<td>";
                            echo "<input type='submit' value='Edit'>";
                            echo "<input type='hidden' name='phonemeType' value='C'>";
                            echo "<input type='hidden' name='effect' value='edit'>";
                            echo "<input type='hidden' name='phonemeID' value=".$phoneme["phonemeID"].">";
                            echo "</td>";
                        echo "</form>";
                        echo "<form method='get' action='phonemeForm.php'>";
                            echo "<td>";
                            echo "<input type='submit' value='Delete'>";
                            echo "<input type='hidden' name='phonemeType' value='C'>";
                            echo "<input type='hidden' name='effect' value='delete'>";
                            echo "<input type='hidden' name='phonemeID' value=".$phoneme["phonemeID"].">";
                            echo "</td>";
                        echo "</form>";
                    echo "</tr>";
                }
            }
        ?>
        </tbody>
        </table>


        <hr>

        <h1 class="display-5 text-primary">Vowels</h1>
        <form method="get" action="phonemeForm.php">
            <input type="submit" class="btn btn-outline-primary" name="submit" value="Create New Vowel" style="margin: 10px;">
            <input type="hidden" name="phonemeType" value="V">
            <input type="hidden" name="effect" value="add">
        </form>

        <table class="table table-dark table-striped table-hover">
        <thead>
        <tr>
        <th scope="col">Symbol</th>
        <th scope="col">Name</th>
        <th scope="col">Height</th>
        <th scope="col">Length</th>
        <th scope="col">Rounding</th>
        <th scope="col">Pronounciation</th>
        <th scope="col">Usage</th>
        <th scope="col">Modifications</th>
        <th scope="col"></th>
        <th scope="col"></th>
        </tr>
        <tbody>
        <?php
            foreach($displayPhonemes as $phoneme){
                if($phoneme["category"] == "V"){
                    $symbol = getSymbol("V", $phoneme["name"]);
                    echo "<tr>";
                        echo "<td>". $symbol ."</td>";
                        echo "<td>".$phoneme["name"]."</td>";
                        echo "<td>".$phoneme["height"]."</td>";
                        echo "<td>".$phoneme["length"]."</td>";
                        echo "<td>".$phoneme["rounding"]."</td>";
                        echo "<td>Pronounciation</td>";
                        echo "<td>Usage</td>";
                        echo "<td>Modifications</td>";
                        echo "<form method='get' action='phonemeForm.php'>";
                            echo "<td>";
                            echo "<input type='submit' value='Edit'>";
                            echo "<input type='hidden' name='phonemeType' value='V'>";
                            echo "<input type='hidden' name='effect' value='edit'>";
                            echo "<input type='hidden' name='phonemeID' value=".$phoneme["phonemeID"].">";
                            echo "</td>";
                        echo "</form>";
                        echo "<form method='get' action='phonemeForm.php'>";
                            echo "<td>";
                            echo "<input type='submit' value='Delete'>";
                            echo "<input type='hidden' name='phonemeType' value='V'>";
                            echo "<input type='hidden' name='effect' value='delete'>";
                            echo "<input type='hidden' name='phonemeID' value=".$phoneme["phonemeID"].">";
                            echo "</td>";
                        echo "</form>";
                    echo "</tr>";
                }
            }
        ?>
        </tbody>
        </table>

        <hr>

        <?php
            $cChartPhonemes = array(); // php array of consonants
            $vChartPhonemes = array(); // php array of vowels

            $cPlaces = array(); // php array of all places
            $cManners = array(); // php array of all manners

            $vLengths = array(); // php array of all lengths
            $vHeights = array(); // php array of all heights

            $hasBilabial = false;
            $hasLabiodental = false;
            $hasDental = false;
            $hasAlveolar = false;
            $hasPostalveolar = false;
            $hasRetroflex = false;
            $hasPalatal = false;
            $hasVelar = false;
            $hasUvular = false;
            $hasPharyngeal = false;
            $hasGlottal = false;

            $hasPlosive = false;
            $hasNasal = false;
            $hasTrill = false;
            $hasTapOrFlap = false;
            $hasFricative = false;
            $hasLateralFricative = false;
            $hasApproximant = false;
            $hasLateralApproximant = false;


            $hasFront = false;
            $hasNearFront = false;
            $hasCentral = false;
            $hasNearBack = false;
            $hasBack = false;

            $hasClose = false;
            $hasNearClose = false;
            $hasCloseMid = false;
            $hasMid = false;
            $hasOpenMid = false;
            $hasNearOpen = false;
            $hasOpen = false;


            foreach($displayPhonemes as $phoneme){
                if($phoneme["category"] == "C"){
                    array_push($cChartPhonemes, $phoneme);
                    
                    if($phoneme["place"] == "bilabial"){
                        $hasBilabial = true;
                        if (in_array($phoneme["place"], $cPlaces) == false){
                            array_push($cPlaces, $phoneme["place"]);  
                        }
                    } else if ($phoneme["place"] == "labiodental"){
                        $hasLabiodental = true;
                        if (in_array($phoneme["place"], $cPlaces) == false){
                            array_push($cPlaces, $phoneme["place"]);  
                        }
                    } else if ($phoneme["place"] == "dental"){
                        $hasDental = true;
                        if (in_array($phoneme["place"], $cPlaces) == false){
                            array_push($cPlaces, $phoneme["place"]);  
                        }
                    } else if ($phoneme["place"] == "alveolar"){
                        $hasAlveolar = true;
                        if (in_array($phoneme["place"], $cPlaces) == false){
                            array_push($cPlaces, $phoneme["place"]);  
                        }
                    } else if ($phoneme["place"] == "postalveolar"){
                        $hasPostalveolar = true;
                        if (in_array($phoneme["place"], $cPlaces) == false){
                            array_push($cPlaces, $phoneme["place"]);  
                        }
                    } else if ($phoneme["place"] == "retroflex"){
                        $hasRetroflex = true;
                        if (in_array($phoneme["place"], $cPlaces) == false){
                            array_push($cPlaces, $phoneme["place"]);  
                        }
                    } else if ($phoneme["place"] == "palatal"){
                        $hasPalatal = true;
                        if (in_array($phoneme["place"], $cPlaces) == false){
                            array_push($cPlaces, $phoneme["place"]);  
                        }
                    } else if ($phoneme["place"] == "velar"){
                        $hasVelar = true;
                        if (in_array($phoneme["place"], $cPlaces) == false){
                            array_push($cPlaces, $phoneme["place"]);  
                        }
                    } else if ($phoneme["place"] == "uvular"){
                        $hasUvular = true;
                        if (in_array($phoneme["place"], $cPlaces) == false){
                            array_push($cPlaces, $phoneme["place"]);  
                        }
                    } else if ($phoneme["place"] == "pharyngeal"){
                        $hasPharyngeal = true;
                        if (in_array($phoneme["place"], $cPlaces) == false){
                            array_push($cPlaces, $phoneme["place"]);  
                        }
                    } else if ($phoneme["place"] == "glottal"){
                        $hasGlottal = true;
                        if (in_array($phoneme["place"], $cPlaces) == false){
                            array_push($cPlaces, $phoneme["place"]);  
                        }
                    }

                    if($phoneme["manner"] == "plosive"){
                        $hasPlosive = true;
                        if (in_array($phoneme["manner"], $cManners) == false){
                            array_push($cManners, $phoneme["manner"]); 
                        }
                    } else if ($phoneme["manner"] == "nasal"){
                        $hasNasal = true;
                        if (in_array($phoneme["manner"], $cManners) == false){
                            array_push($cManners, $phoneme["manner"]); 
                        }
                    } else if ($phoneme["manner"] == "trill"){
                        $hasTrill = true;
                        if (in_array($phoneme["manner"], $cManners) == false){
                            array_push($cManners, $phoneme["manner"]); 
                        }
                    } else if ($phoneme["manner"] == "tap or flap"){
                        $hasTapOrFlap = true;
                        if (in_array($phoneme["manner"], $cManners) == false){
                            array_push($cManners, $phoneme["manner"]); 
                        }
                    } else if ($phoneme["manner"] == "fricative"){
                        $hasFricative = true;
                        if (in_array($phoneme["manner"], $cManners) == false){
                            array_push($cManners, $phoneme["manner"]); 
                        }
                    } else if ($phoneme["manner"] == "lateral fricative"){
                        $hasLateralFricative = true;
                        if (in_array($phoneme["manner"], $cManners) == false){
                            array_push($cManners, $phoneme["manner"]); 
                        }
                    } else if ($phoneme["manner"] == "approximant"){
                        $hasApproximant = true;
                        if (in_array($phoneme["manner"], $cManners) == false){
                            array_push($cManners, $phoneme["manner"]); 
                        }
                    } else if ($phoneme["manner"] == "lateral approximant"){
                        $hasLateralApproximant = true;
                        if (in_array($phoneme["manner"], $cManners) == false){
                            array_push($cManners, $phoneme["manner"]); 
                        }
                    }
                }

                if($phoneme["category"] == "V"){
                    array_push($vChartPhonemes, $phoneme);

                    if($phoneme["length"] == "front"){
                        $hasFront = true;
                        if (in_array($phoneme["length"], $vLengths) == false){
                            array_push($vLengths, $phoneme["length"]);  
                        }
                    } else if ($phoneme["length"] == "near-front"){
                        $hasNearFront = true;
                        if (in_array($phoneme["length"], $vLengths) == false){
                            array_push($vLengths, $phoneme["length"]);  
                        }
                    } else if ($phoneme["length"] == "central"){
                        $hasCentral = true;
                        if (in_array($phoneme["length"], $vLengths) == false){
                            array_push($vLengths, $phoneme["length"]);  
                        }
                    } else if ($phoneme["length"] == "near-back"){
                        $hasNearBack = true;
                        if (in_array($phoneme["length"], $vLengths) == false){
                            array_push($vLengths, $phoneme["length"]);  
                        }
                    } else if ($phoneme["length"] == "back"){
                        $hasBack = true;
                        if (in_array($phoneme["length"], $vLengths) == false){
                            array_push($vLengths, $phoneme["length"]);  
                        }
                    }

                    if($phoneme["height"] == "close"){
                        $hasClose = true;
                        if (in_array($phoneme["height"], $vHeights) == false){
                            array_push($vHeights, $phoneme["height"]);  
                        }
                    } else if ($phoneme["height"] == "near-close"){
                        $hasNearClose = true;
                        if (in_array($phoneme["height"], $vHeights) == false){
                            array_push($vHeights, $phoneme["height"]);  
                        }
                    } else if ($phoneme["height"] == "close-mid"){
                        $hasCloseMid = true;
                        if (in_array($phoneme["height"], $vHeights) == false){
                            array_push($vHeights, $phoneme["height"]);  
                        }
                    } else if ($phoneme["height"] == "mid"){
                        $hasMid = true;
                        if (in_array($phoneme["height"], $vHeights) == false){
                            array_push($vHeights, $phoneme["height"]);  
                        }
                    } else if ($phoneme["height"] == "open-mid"){
                        $hasOpenMid = true;
                        if (in_array($phoneme["height"], $vHeights) == false){
                            array_push($vHeights, $phoneme["height"]);  
                        }
                    } else if ($phoneme["height"] == "near-open"){
                        $hasNearOpen = true;
                        if (in_array($phoneme["height"], $vHeights) == false){
                            array_push($vHeights, $phoneme["height"]);  
                        }
                    } else if ($phoneme["height"] == "open"){
                        $hasOpen = true;
                        if (in_array($phoneme["height"], $vHeights) == false){
                            array_push($vHeights, $phoneme["height"]);  
                        }
                    }
                }
            }
        ?>

        <div style="display: flex; width: 100%">
            <div id="currentPhoneme" style="flex-grow: 1;">
                <div class="rounded-3 fs-4 text-white" style="background-color: #2c3034; padding: 20px; margin: 5px;"></div>
            </div>

            <br>

            <script>
            <?php //php to javascript array for names
                $cChartNames = [];
                $vChartNames = [];

                foreach($displayPhonemes as $phoneme){
                    if ($phoneme["category"] == "C"){
                        $tempName = $phoneme["name"];
                        $tempNameCompress = str_replace(' ', '', $tempName);
                        $cChartNames[$tempNameCompress] = $tempName;
                        //array_push($cChartNames, $tempNameCompress);
                    }
                    else if ($phoneme["category"] == "V"){
                        $tempName = $phoneme["name"];
                        $tempNameCompress = str_replace(' ', '', $tempName);
                        $vChartNames[$tempNameCompress] = $tempName;
                        //array_push($vChartNames, $tempNameCompress);
                    }
                };

                $phpCChartNames = json_encode($cChartNames);
                $phpVChartNames = json_encode($vChartNames);

                echo "var jsCChartNames = ". $phpCChartNames . ";\n";
                echo "var jsVChartNames = ". $phpVChartNames . ";\n";
            ?>

            //console.log(jsCChartNames);
            //console.log(jsVChartNames);
            </script>

            <!-- constant table -->
            <div class="rounded-3 fs-4 text-white" style="background-color: #2c3034; flex-grow: 1; padding: 20px; margin: 5px;">
                <table class="table table-dark table-bordered table-sm" style="font-size: 15px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <?php
                                if($hasBilabial == true) echo '<th scope="col" colspan="2">Bilabial</th>';
                                if($hasLabiodental == true) echo '<th scope="col" colspan="2">Labiodental</th>';
                                if($hasDental == true) echo '<th scope="col" colspan="2">Dental</th>';
                                if($hasAlveolar == true) echo '<th scope="col" colspan="2">Alveolar</th>';
                                if($hasPostalveolar == true) echo '<th scope="col" colspan="2">Postalveolar</th>';
                                if($hasRetroflex == true) echo '<th scope="col" colspan="2">Retroflex</th>';
                                if($hasPalatal == true) echo '<th scope="col" colspan="2">Palatal</th>';
                                if($hasVelar == true) echo '<th scope="col" colspan="2">Velar</th>';
                                if($hasUvular == true) echo '<th scope="col" colspan="2">Uvular</th>';
                                if($hasPharyngeal == true) echo '<th scope="col" colspan="2">Pharyngeal</th>';
                                if($hasGlottal == true) echo '<th scope="col" colspan="2">Glottal</th>';
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cPlaces = orderForIPAChart("CP", $cPlaces);

                        if($hasPlosive == true) {
                            echo '<tr> <th scope="row">Plosive</th>';
                            foreach($cPlaces as $place){
                                echo "<td id='voiceless".$place."plosive'></td>";
                                echo "<td id='voiced".$place."plosive'></td>";
                            }
                        }
                        if($hasNasal == true) {
                            echo '<tr> <th scope="row">Nasal</th>';
                            foreach($cPlaces as $place){
                                echo "<td id='voiceless".$place."nasal'></td>";
                                echo "<td id='voiced".$place."nasal'></td>";
                            }
                        }
                        if($hasTrill == true) {
                            echo '<tr> <th scope="row">Trill</th>';
                            foreach($cPlaces as $place){
                                echo "<td id='voiceless".$place."trill'></td>";
                                echo "<td id='voiced".$place."trill'></td>";
                            }
                        }
                        if($hasTapOrFlap == true) {
                            echo '<tr> <th scope="row">Tap or Flap</th>';
                            foreach($cPlaces as $place){
                                echo "<td id='voiceless".$place."taporflap'></td>";
                                echo "<td id='voiced".$place."taporflap'></td>";
                            }
                        }
                        if($hasFricative == true) {
                            echo '<tr> <th scope="row">Fricative</th>';
                            foreach($cPlaces as $place){
                                echo "<td id='voiceless".$place."fricative'></td>";
                                echo "<td id='voiced".$place."fricative'></td>";
                            }
                        }
                        if($hasLateralFricative == true) {
                            echo '<tr> <th scope="row">Lateral Fricative</th>';
                            foreach($cPlaces as $place){
                                echo "<td id='voiceless".$place."lateralfricative'></td>";
                                echo "<td id='voiced".$place."lateralfricative'></td>";
                            }
                        }
                        if($hasApproximant == true) {
                            echo '<tr> <th scope="row">Approximant</th>';
                            foreach($cPlaces as $place){
                                echo "<td id='voiceless".$place."approximant'></td>";
                                echo "<td id='voiced".$place."approximant'></td>";
                            }
                        }
                        if($hasLateralApproximant == true) {
                            echo '<tr> <th scope="row">Lateral Approximant</th>';
                            foreach($cPlaces as $place){
                                echo "<td id='voiceless".$place."lateralapproximant'></td>";
                                echo "<td id='voiced".$place."lateralapproximant'></td>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <br>

            <!-- vowel table -->
            <div class="rounded-3 fs-4 text-white" style="background-color: #2c3034; flex-grow: 1; padding: 20px; margin: 5px;">
                <table class="table table-dark table-bordered table-sm" style="font-size: 15px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <?php
                                if($hasFront == true) echo '<th scope="col" colspan="2">Front</th>';
                                if($hasNearFront == true) echo '<th scope="col" colspan="2">Near-Front</th>';
                                if($hasCentral == true) echo '<th scope="col" colspan="2">Central</th>';
                                if($hasNearBack == true) echo '<th scope="col" colspan="2">Near-Back</th>';
                                if($hasBack == true) echo '<th scope="col" colspan="2">Back</th>';
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $vLengths = orderForIPAChart("VL", $vLengths);

                        if($hasClose == true) {
                            echo '<tr> <th scope="row">Close</th>';
                            foreach($vLengths as $length){
                                echo "<td id='close".$length."unroundedvowel'></td>";
                                echo "<td id='close".$length."roundedvowel'></td>";
                            }
                        }
                        if($hasNearClose == true) {
                            echo '<tr> <th scope="row">Near-Close</th>';
                            foreach($vLengths as $length){
                                echo "<td id='near-close".$length."unroundedvowel'></td>";
                                echo "<td id='near-close".$length."roundedvowel'></td>";
                            }
                        }
                        if($hasCloseMid == true) {
                            echo '<tr> <th scope="row">Close-Mid</th>';
                            foreach($vLengths as $length){
                                echo "<td id='close-mid".$length."unroundedvowel'></td>";
                                echo "<td id='close-mid".$length."roundedvowel'></td>";
                            }
                        }
                        if($hasMid == true) {
                            echo '<tr> <th scope="row">Mid</th>';
                            foreach($vLengths as $length){
                                echo "<td id='mid".$length."unroundedvowel'></td>";
                                echo "<td id='mid".$length."roundedvowel'></td>";
                            }
                        }
                        if($hasOpenMid == true) {
                            echo '<tr> <th scope="row">Open-Mid</th>';
                            foreach($vLengths as $length){
                                echo "<td id='open-mid".$length."unroundedvowel'></td>";
                                echo "<td id='open-mid".$length."roundedvowel'></td>";
                            }
                        }
                        if($hasNearOpen == true) {
                            echo '<tr> <th scope="row">Near-Open</th>';
                            foreach($vLengths as $length){
                                echo "<td id='near-open".$length."unroundedvowel'></td>";
                                echo "<td id='near-open".$length."roundedvowel'></td>";
                            }
                        }
                        if($hasOpen == true) {
                            echo '<tr> <th scope="row">Open</th>';
                            foreach($vLengths as $length){
                                echo "<td id='open".$length."unroundedvowel'></td>";
                                echo "<td id='open".$length."roundedvowel'></td>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <script>
            <?php
                $cSymbolsByName = [];
                foreach($cChartNames as $key => $value){
                    $tempSymbol = getSymbol("C", "$value");
                    $cSymbolsByName[$key] = $tempSymbol;
                }
                $phpCSymbolsByName = json_encode($cSymbolsByName);
                echo "var jsCSymbolsByName = ". $phpCSymbolsByName . ";\n";

                $vSymbolsByName = [];
                foreach($vChartNames as $key => $value){
                    $tempSymbol = getSymbol("V", "$value");
                    $vSymbolsByName[$key] = $tempSymbol;
                }
                $phpVSymbolsByName = json_encode($vSymbolsByName);
                echo "var jsVSymbolsByName = ". $phpVSymbolsByName . ";\n";

                // $symbolABC = getSymbol("C", "voiced alveolar plosive");
                // echo "\$symbolABC = '$symbolABC';";
            ?>
        </script>

        <script>
            function showDisplay(key){
                $symbolToDisplay = jsCSymbolsByName[key.replace(/\s/g, '')];
                if($symbolToDisplay == undefined){$symbolToDisplay = jsVSymbolsByName[key.replace(/\s/g, '')];}
                $phonemeHTMLDisplay = '<div class="rounded-3 fs-4 text-white" style="background-color: #2c3034; padding: 20px; margin: 5px;"><h1>'+$symbolToDisplay+'</h1> <p>'+key+'</p></div>';
                $("#currentPhoneme").html($phonemeHTMLDisplay);
            }
            $(document).ready(function(){
                for (let key in jsCSymbolsByName) {
                    let value = jsCSymbolsByName[key];
                    let commandID = jsCChartNames[key];

                    $htmlTemp = '<p>'+value+'</p>';
                    $("#"+key+"").html($htmlTemp);
                    //$("#"+key+"").attr('onclick', 'showDisplay("$commandID")');
                    $("#"+key+"").click(function(){ showDisplay(commandID); });
                }

                for (let key in jsVSymbolsByName) {
                    let value = jsVSymbolsByName[key];
                    let commandID = jsVChartNames[key];

                    $htmlTemp = '<p>'+value+'</p>';
                    $("#"+key+"").html($htmlTemp);
                    //$("#"+key+"").attr('onclick', 'showDisplay("$commandID")');
                    $("#"+key+"").click(function(){ showDisplay(commandID); });
                }
            });

            // $(document).ready(function(){
            //     if (jQuery) {  
            //     // jQuery is loaded  
            //     alert("Yeah!");
            //     } else {
            //     // jQuery is not loaded
            //     alert("Doesn't Work");
            //     }
            // });
        </script>

        <script scr="js/bootstrap.bundle.min.js"></script>
    </body>
</html>