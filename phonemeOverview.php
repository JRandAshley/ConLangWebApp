<?php
    include 'displayOptions.php';
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
</head>
    <body class="container" style="background-color:black; margin-top:20px;">
        <?php
        $languageID = $_SESSION["languageID"];
        include "navigationBar.php";
        $displayPhonemes = array();

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
                        "height"=> $height,
                        "length"=> $length,
                        "rounding"=> $rounding
                    );
                }
                $displayPhonemes[] = array_merge($displayPhonemes, $phoneme);
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
                        echo "<form method='get' action='phonemeForm.php'>";
                            echo "<td>";
                            echo "<input type='submit' value='Edit'>";
                            echo "<input type='hidden' name='effect' value='edit'>";
                            echo "<input type='hidden' name='phonemeID' value=".$phoneme["phonemeID"].">";
                            echo "</td>";
                        echo "</form>";
                        echo "<form method='get' action='phonemeForm.php'>";
                            echo "<td>";
                            echo "<input type='submit' value='Delete'>";
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
                        echo "<form method='get' action='phonemeForm.php'>";
                            echo "<td>";
                            echo "<input type='submit' value='Edit'>";
                            echo "<input type='hidden' name='effect' value='edit'>";
                            echo "<input type='hidden' name='phonemeID' value=".$phoneme["phonemeID"].">";
                            echo "</td>";
                        echo "</form>";
                        echo "<form method='get' action='phonemeForm.php'>";
                            echo "<td>";
                            echo "<input type='submit' value='Delete'>";
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

        <script scr="js/bootstrap.bundle.min.js"></script>
    </body>
</html>