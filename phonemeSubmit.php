<?php
    session_start();
    require 'includes/dbh.inc.php';

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
    if(isset($_SESSION["languageID"])) {
        $languageID = $_SESSION["languageID"];
    }
    else {
        die();
    }

    if($_POST["effect"] == "add") {
        if($_POST["type"] == "C") {
            $phonemeName = $_POST["voicing"] . " " . $_POST["place"] . " " . $_POST["manner"];
            $phonemeCategory = $_POST["type"];
            $place = $_POST["place"];
            $manner = $_POST["manner"];
            $voicing = $_POST["voicing"];
    
            $tsql = "insert into tblPhonemes (PhonemeName, Category, Place, Manner, Voicing, LanguageID) values (?, ?, ?, ?, ?, ?);";
            $params = array($phonemeName, $phonemeCategory, $place, $manner, $voicing, $languageID);

            $stmt = sqlsrv_query($conn,$tsql,$params);
    
            if( $stmt === false ) {
                die( print_r( sqlsrv_errors(), true));
           }
        }
        else if($_POST["type"] == "V") {
            $phonemeName = $_POST["height"] . " " . $_POST["length"] . " " . $_POST["rounding"] . " vowel";
            $phonemeCategory = $_POST["type"];
            $height = $_POST["height"];
            $length = $_POST["length"];
            $rounding = $_POST["rounding"];
    
            $tsql = "insert into tblPhonemes (PhonemeName, Category, Height, VLength, Rounding, LanguageID) values (?, ?, ?, ?, ?, ?);";
            $params = array($phonemeName, $phonemeCategory, $height, $length, $rounding, $languageID);

            $stmt = sqlsrv_query($conn,$tsql,$params);
    
            if( $stmt === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
        }
        else {
            //test
        }
    }
    else if($_POST["effect"] == "edit") {
        //test
    }
    else if($_POST["effect"] == "delete") {
        $phonemeID = $_POST["phonemeID"];
        $tsql = "delete from tblPhonemes where PhonemeID = ?;";
        $params = array($phonemeID);

        $stmt = sqlsrv_query($conn,$tsql,$params);

        if( $stmt === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
    }
    else {
        //test
    }

    header("Location:phonemeOverview.php");
?>