<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Language Overview Page</title>
    <link rel="stylesheet" type="text/css" href="css/conlang.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/jquery-3.7.1.min.js"></script>

    <!-- Display Toggle -->
    <script>
        $(document).ready(function() {
            //test
        });
        window.onload = function() {
            // test
        };
    </script>
</head>



<body class="container" style="background-color: black; margin-top: 20px;">

    <?php
    $language = $_SESSION["language"];
    $effect = NULL;
    $type = NULL;
    $phonemeID = NULL;

    //Retrieve Get Data
    if(isset($_GET["effect"])){
        $effect = $_GET["effect"];
        
        if($effect == "add") {
            if(isset($_GET["phonemeType"])) {
                $type = $_GET["phonemeType"];
            }
            if($type == "C") {
                echo <<<GFG
                    <h1 class='display-3 text-primary'>Add a Consonant</h1>
                    <div class="rounded-3 fs-4 text-white" style="background-color: #2c3034; padding: 20px;">
                    <form method="post" action="phonemeSubmit.php">
                        <input name='type' id='type' type='hidden' value='$type'></input>
                        <input name='effect' id='effect' type='hidden' value='$effect'></input>
                        <input id="phonemeID" type="hidden" value="-1"></input>
                        <label for="place">Place of Articulation:</label>
                        <select name="place" id="place" required="true">
                            <option value="" disabled="true" selected="true">Select One</option>
                            <option value="bilabial">Bilabial</option>
                            <option value="labiodental">Labiodental</option>
                            <option value="dental">Dental</option>
                            <option value="alveolar">Alveolar</option>
                            <option value="postalveolar">Postalveolar</option>
                            <option value="retroflex">Retroflex</option>
                            <option value="palatal">Palatal</option>
                            <option value="velar">Velar</option>
                            <option value="uvular">Uvular</option>
                            <option value="pharyngeal">Pharyngeal</option>
                            <option value="glottal">Glottal</option>
                        </select>
        
                        </br>
        
                        <label for="manner">Manner of Articulation:</label>
                        <select name="manner" id="manner" required="true">
                            <option value="">Select One</option>
                            <option value="plosive">Plosive</option>
                            <option value="nasal">Nasal</option>
                            <option value="trill">Trill</option>
                            <option value="tap of flap">Tap of Flap</option>
                            <option value="fricative">Fricative</option>
                            <option value="lateral fricative">Lateral fricative</option>
                            <option value="approximant">Approximant</option>
                            <option value="lateral approximant">Lateral approximant</option>
                        </select>
        
                        </br>
        
                        <label for="voicing">Is it Voiced?</label>
                        <select name="voicing" id="voicing" required="true">
                            <option value="">Select One</option>
                            <option value="voiced">Voiced</option>
                            <option value="voiceless">Voiceless</option>
                        </select>
        
                        </br>
        
                        <input type="submit" name="submit" value="Submit">
                    </form>
                    </div>
                GFG;
            }
            elseif($type == "V") {
                echo <<<GFG
                    <h1 class='display-3 text-primary'>Add a Vowel</h1>
                    <div class="rounded-3 fs-4 text-white" style="background-color: #2c3034; padding: 20px;">
                    <form method="post" action="phonemeSubmit.php">
                        <input name='type' id='type' type='hidden' value='$type'></input>
                        <input name='effect' id='effect' type='hidden' value='$effect'></input>
                        <input id="phonemeID" type="hidden" value="-1"></input>
                        <label for="height">Height:</label>
                        <select name="height" id="height" required="true">
                            <option value="" disabled="true" selected="true">Select One</option>
                            <option value="close">Close</option>
                            <option value="near-close">Near-Close</option>
                            <option value="close-mid">Close-Mid</option>
                            <option value="mid">Mid</option>
                            <option value="open-mid">Open-Mid</option>
                            <option value="near-open">Near-Open</option>
                            <option value="open">Open</option>
                        </select>

                        </br>

                        <label for="length">Length:</label>
                        <select name="length" id="length" required="true">
                            <option value="">Select One</option>
                            <option value="front">Front</option>
                            <option value="near-front">Near-Front</option>
                            <option value="central">Central</option>
                            <option value="near-back">Near-Back</option>
                            <option value="back">Back</option>
                        </select>

                        </br>

                        <label for="rounding">Is it Rounded?</label>
                        <select name="rounding" id="rounding" required="true">
                            <option value="">Select One</option>
                            <option value="rounded">Rounded</option>
                            <option value="unrounded">Unrounded</option>
                        </select>

                        </br>

                        <input type="submit" name="submit" value="Submit">
                    </form>
                    </div>
                GFG;
            }
        }
        elseif($effect == "edit") {
            //test
        }
        elseif($effect == "delete") {
            if(isset($_GET["phonemeID"])) {
                $phonemeID = $_GET["phonemeID"];
            }

            $datas = file_get_contents('json-files/phonemes.json');
            $phonemes = json_decode($datas, true);//get and decode json

            $count= count($phonemes);
            if($count > 0){
                for ($i=0; $i < $count; $i++) {
                    $phonemeName = NULL;
                    $phonemeCategory = NULL;
                    //consonant
                    $voicing = NULL;
                    $place = NULL;
                    $manner = NUll;
                    //vowel
                    $height = NULL;
                    $length = NULL;
                    $rounding = NULL;

                    if($phonemes[$i]["phonemeID"] == $phonemeID) {
                        $language = $phonemes[$i]["language"];
                        if($phonemes[$i]["category"] == "C") {
                            $phonemeCategory = $phonemes[$i]["category"];
                            $phonemeName = $phonemes[$i]["voicing"] . " " . $phonemes[$i]["place"] . " " . $phonemes[$i]["manner"];
                            $voicing = $phonemes[$i]["voicing"];
                            $place = $phonemes[$i]["place"];
                            $manner = $phonemes[$i]["manner"];
                        }else if($phonemes[$i]["category"] == "V") {
                            $phonemeCategory = $phonemes[$i]["category"];
                            $phonemeName = $phonemes[$i]["height"] . " " . $phonemes[$i]["length"] . " " . $phonemes[$i]["rounding"] . " vowel";
                            $height = $phonemes[$i]["height"];
                            $length = $phonemes[$i]["length"];
                            $rounding = $phonemes[$i]["rounding"];
                        }

                        if($phonemes[$i]["category"] == "C") {
                            echo <<<GFG
                                <h1 class='display-3 text-primary'>Would you like to delete the following Consonant?</h1>
                                <div class="rounded-3 fs-4 text-white" style="background-color: #2c3034; padding: 20px;">
                                <form method="post" action="phonemeSubmit.php">
                                    <input name='type' id='type' type='hidden' value='$phonemeCategory'></input>
                                    <input name='effect' id='effect' type='hidden' value='$effect'></input>
                                    <input name='phonemeID' id="phonemeID" type="hidden" value='$phonemeID'></input>

                                    <input id="place" type="hidden" value='$place'></input>
                                    <input id="manner" type="hidden" value='$manner'></input>
                                    <input id="voicing" type="hidden" value='$voicing'></input>

                                    <h1 class='display-5 text-primary'>Place of Articulation: $place</h1>
                                    </br>
                                    <h1 class='display-5 text-primary'>Manner of Articulation: $manner</h1>
                                    </br>
                                    <h1 class='display-5 text-primary'>Voicing: $voicing</h1>
                                    </br>
                    
                                    <input type="submit" name="submit" value="Submit">
                                </form>
                                </div>
                            GFG;
                        }
                        if($phonemes[$i]["category"] == "V") {
                            echo <<<GFG
                                <h1 class='display-3 text-primary'>Would you like to delete the following Vowel?</h1>
                                <div class="rounded-3 fs-4 text-white" style="background-color: #2c3034; padding: 20px;">
                                <form method="post" action="phonemeSubmit.php">
                                    <input name='type' id='type' type='hidden' value='$phonemeCategory'></input>
                                    <input name='effect' id='effect' type='hidden' value='$effect'></input>
                                    <input name='phonemeID' id="phonemeID" type="hidden" value='$phonemeID'></input>

                                    <input id="height" type="hidden" value='$height'></input>
                                    <input id="length" type="hidden" value='$length'></input>
                                    <input id="rounding" type="hidden" value='$rounding'></input>

                                    <h1 class='display-5 text-primary'>Height: $height</h1>
                                    </br>
                                    <h1 class='display-5 text-primary'>Length: $length</h1>
                                    </br>
                                    <h1 class='display-5 text-primary'>Rounding: $rounding</h1>
                                    </br>
                    
                                    <input type="submit" name="submit" value="Submit">
                                </form>
                                </div>
                            GFG;
                        }
                    }
                }
            }
        }
        else {

        }
    }
    ?>
</body>
</html>