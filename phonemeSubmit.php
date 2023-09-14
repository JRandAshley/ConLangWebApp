<?php
    session_start();

    $datas = file_get_contents('json-files/phonemes.json');
    $phonemes = json_decode($datas, true);//get and decode json

    $message = "test";

    $effect = $_POST["effect"];
    $phonemeID = NULL;
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

    if($_POST["effect"] == "add") {
        if($_POST["type"] == "C") {
            $message = "You added a " . $_POST["voicing"] ." ". $_POST["place"] ." ". $_POST["manner"];
            
            $phonemeName = $_POST["voicing"] . " " . $_POST["place"] . " " . $_POST["manner"];
            $phonemeCategory = $_POST["type"];
            $place = $_POST["place"];
            $manner = $_POST["manner"];
            $voicing = $_POST["voicing"];
    
            $newID = uniqid(); 
    
            $phoneme = array(
                "phonemeID" => $newID,
                "name" => $phonemeName,
                "language"=> $_SESSION["language"],
                "category"=> $phonemeCategory,
                "place"=> $place,
                "manner"=> $manner,
                "voicing"=> $voicing
            );
    
            array_push($phonemes, $phoneme);
        }
        else if($_POST["type"] == "V") {
            $message = "You added a " . $_POST["height"] ." ". $_POST["length"] ." ". $_POST["rounding"] ." vowel";
    
            $phonemeName = $_POST["height"] . " " . $_POST["length"] . " " . $_POST["rounding"] . " vowel";
            $phonemeCategory = $_POST["type"];
            $height = $_POST["height"];
            $length = $_POST["length"];
            $rounding = $_POST["rounding"];
    
            $newID = uniqid(); 
    
            $phoneme = array(
                "phonemeID" => $newID,
                "name" => $phonemeName,
                "language"=> $_SESSION["language"],
                "category"=> $phonemeCategory,
                "height"=> $height,
                "length"=> $length,
                "rounding"=> $rounding
            );
    
            array_push($phonemes, $phoneme);
        }
        else {
            $message = "Error";
        }
    }
    else if($_POST["effect"] == "edit") {
        //test
    }
    else if($_POST["effect"] == "delete") {
        $phonemeID = $_POST["phonemeID"];
        if($_POST["type"] == "C") {
            //$message = "You deleted a " . $_POST["voicing"] ." ". $_POST["place"] ." ". $_POST["manner"];
            

            foreach($phonemes as $key=>$phoneme) {
                if($phoneme['phonemeID'] == $phonemeID) {
                    unset($phonemes[$key]);
                }
            }
        }
        else if($_POST["type"] == "V") {
            $message = "You added a " . $_POST["height"] ." ". $_POST["length"] ." ". $_POST["rounding"] ." vowel";
    
            $phonemeName = $_POST["height"] . " " . $_POST["length"] . " " . $_POST["rounding"] . " vowel";
            $phonemeCategory = $_POST["type"];
            $height = $_POST["height"];
            $length = $_POST["length"];
            $rounding = $_POST["rounding"];
    
            $newID = uniqid(); 
    
            $phoneme = array(
                "phonemeID" => $newID,
                "name" => $phonemeName,
                "language"=> $_SESSION["language"],
                "category"=> $phonemeCategory,
                "height"=> $height,
                "length"=> $length,
                "rounding"=> $rounding
            );
    
            array_push($phonemes, $phoneme);
        }
        else {
            $message = "Error";
        }
    }
    else {
        $message = "Error";
    }

    $phonemes = json_encode($phonemes);

    file_put_contents('json-files/phonemes.json', $phonemes);

    header("Location:languageOverview.php");
    
    // if(isset($_POST["effect"])) {
    //     $effect = $_POST["effect"];

    //     if($effect == "add"){
    //         if($_POST["type"] == "C") {
    //             $message = "You added a " . $_POST["voicing"] ." ". $_POST["place"] ." ". $_POST["manner"];
                
    //             $phonemeName = $_POST["voicing"] . " " . $_POST["place"] . " " . $_POST["manner"];
    //             $phonemeCategory = $_POST["type"];
    //             $place = $_POST["place"];
    //             $manner = $_POST["manner"];
    //             $voicing = $_POST["voicing"];
        
    //             $newID = uniqid(); 
        
    //             $phoneme = array(
    //                 "phonemeID" => $newID,
    //                 "name" => $phonemeName,
    //                 "language"=> $_SESSION["language"],
    //                 "category"=> $phonemeCategory,
    //                 "place"=> $place,
    //                 "manner"=> $manner,
    //                 "voicing"=> $voicing
    //             );
        
    //             array_push($phonemes, $phoneme);
    //         }
    //         else if($_POST["type"] == "V") {
    //             $message = "You added a " . $_POST["height"] ." ". $_POST["length"] ." ". $_POST["rounding"] ." vowel";
        
    //             $phonemeName = $_POST["height"] . " " . $_POST["length"] . " " . $_POST["rounding"] . " vowel";
    //             $phonemeCategory = $_POST["type"];
    //             $height = $_POST["height"];
    //             $length = $_POST["length"];
    //             $rounding = $_POST["rounding"];
        
    //             $newID = uniqid(); 
        
    //             $phoneme = array(
    //                 "phonemeID" => $newID,
    //                 "name" => $phonemeName,
    //                 "language"=> $_SESSION["language"],
    //                 "category"=> $phonemeCategory,
    //                 "height"=> $height,
    //                 "length"=> $length,
    //                 "rounding"=> $rounding
    //             );
        
    //             array_push($phonemes, $phoneme);
    //         }
    //         else {
    //             $message = "Error";
    //         }
        
    //         $phonemes = json_encode($phonemes);
        
    //         file_put_contents('json-files/phonemes.json', $phonemes);
        
    //         header("Location:languageOverview.php");
    //     }
    //     elseif($effect == "edit") {
    //         //test
    //     }
    //     elseif($effect == "delete") {
    //         if($_POST["type"] == "C") {
    //             $message = "You deleted a " . $_POST["voicing"] ." ". $_POST["place"] ." ". $_POST["manner"];
                
    //             //test
        
    //             array_push($phonemes, $phoneme);
    //         }
    //         else if($_POST["type"] == "V") {
    //             $message = "You deleted a " . $_POST["height"] ." ". $_POST["length"] ." ". $_POST["rounding"] ." vowel";
        
    //             //test
        
    //             array_push($phonemes, $phoneme);
    //         }
    //         else {
    //             $message = "Error";
    //         }

    //         //echo "<html><h1>" . "test" . "</h1></html>";
        
    //         $phonemes = json_encode($phonemes);
        
    //         file_put_contents('json-files/phonemes.json', $phonemes);
        
    //         header("Location:languageOverview.php");
    //     }
    //     else {
    //         $message = "Error";
    //     }
    // }

?>