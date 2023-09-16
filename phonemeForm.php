<?php
    session_start();
    require 'includes/dbh.inc.php';
    include 'displayOptions.php';
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
    $effect = NULL;
    $type = NULL;
    $phonemeID = NULL;
    ?>
    
    <script>
    function setInputs(category, PorH, MorL, VorR) {
        if(category == "C"){
            document.getElementById('place').value=PorH;
            document.getElementById('manner').value=MorL;
            document.getElementById('voicing').value=VorR;
        }
        if(category == "V"){
            document.getElementById('height').value=PorH;
            document.getElementById('length').value=MorL;
            document.getElementById('rounding').value=VorR;
        }
    }
    </script>

    <div name="consonantChart" id="consonantChart">
        
    </div>

    <?php
    //Retrieve Get Data
    if(isset($_GET["effect"])){
        $effect = $_GET["effect"];
        
        //Add----------------------------------------------------
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
                    <button onclick="setInputs('C','uvular','lateral fricative','voiceless')">Click me</button>
                GFG;
            }
            elseif($type == "V") {
                echo <<<GFG
                    <h1 class='display-3 text-primary'>Add a Vowel</h1>
                    <div class="rounded-3 fs-4 text-white" style="background-color: #2c3034; padding: 20px;">
                    <form method="post" action="phonemeSubmit.php">
                        <input name='type' id='type' type='hidden' value='$type'></input>
                        <input name='effect' id='effect' type='hidden' value='$effect'></input>
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
        //Edit------------------------------------------------------
        elseif($effect == "edit") {
            if(isset($_GET["phonemeType"])) {
                $type = $_GET["phonemeType"];
            }
            if(isset($_GET["phonemeID"])) {
                $phonemeID = $_GET["phonemeID"];
            }
            $tsql = "select * from tblPhonemes where PhonemeID='".$phonemeID."';";
            $stmt = sqlsrv_query($conn,$tsql);
            if($stmt == false){
                echo "Error";
            }
            else{
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
                while($obj = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
                    $phonemeName = $obj['PhonemeName'];
                    $phonemeCategory = $obj['Category'];
                    if($phonemeCategory == "C") {
                        $voicing = $obj['Voicing'];
                        $place = $obj['Place'];
                        $manner = $obj['Manner'];

                        $symbol = getSymbol("C", $obj["PhonemeName"]);

                        echo <<<GFG
                            <h1 class='display-3 text-primary'>Edit this Consonant</h1>
                            <div class="rounded-3 fs-4 text-white" style="background-color: #2c3034; padding: 20px;">
                            <form method="post" action="phonemeSubmit.php">
                                <input name='phonemeCategory' id='phonemeCategory' type='hidden' value='$phonemeCategory'></input>
                                <input name='effect' id='effect' type='hidden' value='$effect'></input>
                                <input name='phonemeID' id='$phonemeID' type='hidden' value='$phonemeID'></input>
                                <h1>$symbol - $phonemeName</h1>
                                <label for="place">Place of Articulation:</label>
                                <select name="place" id="place" required="true">
                                    <option value="" disabled="true">Select One</option>
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
                                    <option value="" disabled="true">Select One</option>
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
                                    <option value="" disabled="true">Select One</option>
                                    <option value="voiced">Voiced</option>
                                    <option value="voiceless">Voiceless</option>
                                </select>
                
                                </br>
                
                                <input type="submit" name="submit" value="Submit">
                            </form>
                            </div>
                            <script>
                                document.getElementById('place').value="$place";
                                document.getElementById('manner').value="$manner";
                                document.getElementById('voicing').value="$voicing";
                            </script>
                        GFG;
                    }
                    elseif($phonemeCategory == "V") {
                        $height = $obj['Height'];
                        $length = $obj['VLength'];
                        $rounding = $obj['Rounding'];

                        $symbol = getSymbol("V", $obj["PhonemeName"]);

                        echo <<<GFG
                            <h1 class='display-3 text-primary'>Add a Vowel</h1>
                            <div class="rounded-3 fs-4 text-white" style="background-color: #2c3034; padding: 20px;">
                            <form method="post" action="phonemeSubmit.php">
                                <input name='phonemeCategory' id='phonemeCategory' type='hidden' value='$phonemeCategory'></input>
                                <input name='effect' id='effect' type='hidden' value='$effect'></input>
                                <input name='phonemeID' id='$phonemeID' type='hidden' value='$phonemeID'></input>
                                <h1>$symbol - $phonemeName</h1>
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
                                    <option value="" disabled="true">Select One</option>
                                    <option value="front">Front</option>
                                    <option value="near-front">Near-Front</option>
                                    <option value="central">Central</option>
                                    <option value="near-back">Near-Back</option>
                                    <option value="back">Back</option>
                                </select>

                                </br>

                                <label for="rounding">Is it Rounded?</label>
                                <select name="rounding" id="rounding" required="true">
                                    <option value="" disabled="true">Select One</option>
                                    <option value="rounded">Rounded</option>
                                    <option value="unrounded">Unrounded</option>
                                </select>

                                </br>

                                <input type="submit" name="submit" value="Submit">
                            </form>
                            </div>
                            <script>
                                document.getElementById('height').value="$height";
                                document.getElementById('length').value="$length";
                                document.getElementById('rounding').value="$rounding";
                            </script>
                        GFG;
                    }
                }
            }
        }
        //Delete--------------------------------------------------------
        elseif($effect == "delete") {
            if(isset($_GET["phonemeID"])) {
                $phonemeID = $_GET["phonemeID"];
            }
            $tsql = "select * from tblPhonemes where PhonemeID='".$phonemeID."';";
            $stmt = sqlsrv_query($conn,$tsql);
            if($stmt == false){
                echo "Error";
            }
            else{
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
                while($obj = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
                    $phonemeName = $obj['PhonemeName'];
                    $phonemeCategory = $obj['Category'];

                    if($phonemeCategory == "C"){
                        $voicing = $obj['Voicing'];
                        $place = $obj['Place'];
                        $manner = $obj['Manner'];

                        echo <<<GFG
                            <h1 class='display-3 text-primary'>You are about to delete the following Consonant</h1>
                            <div class="rounded-3 fs-4 text-white" style="background-color: #2c3034; padding: 20px;">
                            <form method="post" action="phonemeSubmit.php">
                                <input name='phonemeID' id='type' type='hidden' value='$phonemeID'></input>
                                <input name='effect' id='effect' type='hidden' value='$effect'></input>
                                <label>Name: $phonemeName</label>

                                </br>

                                <label>Place: $place</label>

                                </br>

                                <label>Manner: $manner</label>

                                </br>

                                <label>Is it Voiced?: $voicing</label>

                                </br>

                                <input type="submit" name="submit" value="Submit">
                            </form>
                            </div>
                        GFG;
                    }
                    else if($phonemeCategory == "V"){
                        $height = $obj['Height'];
                        $length = $obj['VLength'];
                        $rounding = $obj['Rounding'];

                        echo <<<GFG
                            <h1 class='display-3 text-primary'>You are about to delete the following Vowel</h1>
                            <div class="rounded-3 fs-4 text-white" style="background-color: #2c3034; padding: 20px;">
                            <form method="post" action="phonemeSubmit.php">
                                <input name='phonemeID' id='type' type='hidden' value='$phonemeID'></input>
                                <input name='effect' id='effect' type='hidden' value='$effect'></input>
                                <label>Name: $phonemeName</label>

                                </br>

                                <label>Height: $height</label>

                                </br>

                                <label>Length: $length</label>

                                </br>

                                <label>Is it Rounded?: $rounding</label>

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
    ?>
</body>
</html>