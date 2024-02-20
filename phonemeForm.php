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

    <div class="rounded-3 fs-4 text-white" style="background-color: #2c3034; padding: 20px; <?php if($_GET["phonemeType"] == "V"){echo "display: none;";} ?>" name="consonantChart" id="consonantChart">
        <table class="table table-dark table-bordered table-sm" style="font-size: 15px;">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" colspan="2">Bilabial</th>
                    <th scope="col" colspan="2">Labiodental</th>
                    <th scope="col" colspan="2">Dental</th>
                    <th scope="col" colspan="2">Alveolar</th>
                    <th scope="col" colspan="2">Postalveolar</th>
                    <th scope="col" colspan="2">Retroflex</th>
                    <th scope="col" colspan="2">Palatal</th>
                    <th scope="col" colspan="2">Velar</th>
                    <th scope="col" colspan="2">Uvular</th>
                    <th scope="col" colspan="2">Pharyngeal</th>
                    <th scope="col" colspan="2">Glottal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Plosive</th>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'bilabial', 'plosive', 'voiceless')"><?php echo getSymbol("C", "voiceless bilabial plosive"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'bilabial', 'plosive', 'voiced')"><?php echo getSymbol("C", "voiced bilabial plosive"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'alveolar', 'plosive', 'voiceless')"><?php echo getSymbol("C", "voiceless alveolar plosive"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'alveolar', 'plosive', 'voiced')"><?php echo getSymbol("C", "voiced alveolar plosive"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'retroflex', 'plosive', 'voiceless')"><?php echo getSymbol("C", "voiceless retroflex plosive"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'retroflex', 'plosive', 'voiced')"><?php echo getSymbol("C", "voiced retroflex plosive"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'palatal', 'plosive', 'voiceless')"><?php echo getSymbol("C", "voiceless palatal plosive"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'palatal', 'plosive', 'voiced')"><?php echo getSymbol("C", "voiced palatal plosive"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'velar', 'plosive', 'voiceless')"><?php echo getSymbol("C", "voiceless velar plosive"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'velar', 'plosive', 'voiced')"><?php echo getSymbol("C", "voiced velar plosive"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'uvular', 'plosive', 'voiceless')"><?php echo getSymbol("C", "voiceless uvular plosive"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'uvular', 'plosive', 'voiced')"><?php echo getSymbol("C", "voiced uvular plosive"); ?></button></td>
                    <td></td>
                    <td class="table-active"></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'glottal', 'plosive', 'voiceless')"><?php echo getSymbol("C", "voiceless glottal plosive"); ?></button></td>
                    <td class="table-active"></td>
                </tr>
                <tr>
                    <th scope="row">Nasal</th>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'bilabial', 'nasal', 'voiced')"><?php echo getSymbol("C", "voiced bilabial nasal"); ?></button></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'labiodental', 'nasal', 'voiced')"><?php echo getSymbol("C", "voiced labiodental nasal"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'alveolar', 'nasal', 'voiced')"><?php echo getSymbol("C", "voiced alveolar nasal"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'retroflex', 'nasal', 'voiced')"><?php echo getSymbol("C", "voiced retroflex nasal"); ?></button></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'palatal', 'nasal', 'voiced')"><?php echo getSymbol("C", "voiced palatal nasal"); ?></button></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'velar', 'nasal', 'voiced')"><?php echo getSymbol("C", "voiced velar nasal"); ?></button></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'uvular', 'nasal', 'voiced')"><?php echo getSymbol("C", "voiced uvular nasal"); ?></button></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                <tr>
                    <th scope="row">Trill</th>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'bilabial', 'trill', 'voiced')"><?php echo getSymbol("C", "voiced bilabial trill"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'alveolar', 'trill', 'voiced')"><?php echo getSymbol("C", "voiced alveolar trill"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'uvular', 'trill', 'voiced')"><?php echo getSymbol("C", "voiced uvular trill"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                </tr>
                <tr>
                    <th scope="row">Tap or Flap</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'labiodental', 'tap or flap', 'voiced')"><?php echo getSymbol("C", "voiced labiodental tap or flap"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'alveolar', 'tap or flap', 'voiced')"><?php echo getSymbol("C", "voiced alveolar tap or flap"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'retroflex', 'tap or flap', 'voiced')"><?php echo getSymbol("C", "voiced retroflex tap or flap"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                </tr>
                <tr>
                    <th scope="row">Fricative</th>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'bilabial', 'fricative', 'voiceless')"><?php echo getSymbol("C", "voiceless bilabial fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'bilabial', 'fricative', 'voiced')"><?php echo getSymbol("C", "voiced bilabial fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'labiodental', 'fricative', 'voiceless')"><?php echo getSymbol("C", "voiceless labiodental fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'labiodental', 'fricative', 'voiced')"><?php echo getSymbol("C", "voiced labiodental fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'dental', 'fricative', 'voiceless')"><?php echo getSymbol("C", "voiceless dental fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'dental', 'fricative', 'voiced')"><?php echo getSymbol("C", "voiced dental fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'alveolar', 'fricative', 'voiceless')"><?php echo getSymbol("C", "voiceless alveolar fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'alveolar', 'fricative', 'voiced')"><?php echo getSymbol("C", "voiced alveolar fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'postalveolar', 'fricative', 'voiceless')"><?php echo getSymbol("C", "voiceless postalveolar fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'postalveolar', 'fricative', 'voiced')"><?php echo getSymbol("C", "voiced postalveolar fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'retroflex', 'fricative', 'voiceless')"><?php echo getSymbol("C", "voiceless retroflex fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'retroflex', 'fricative', 'voiced')"><?php echo getSymbol("C", "voiced retroflex fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'palatal', 'fricative', 'voiceless')"><?php echo getSymbol("C", "voiceless palatal fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'palatal', 'fricative', 'voiced')"><?php echo getSymbol("C", "voiced palatal fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'velar', 'fricative', 'voiceless')"><?php echo getSymbol("C", "voiceless velar fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'velar', 'fricative', 'voiced')"><?php echo getSymbol("C", "voiced velar fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'uvular', 'fricative', 'voiceless')"><?php echo getSymbol("C", "voiceless uvular fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'uvular', 'fricative', 'voiced')"><?php echo getSymbol("C", "voiced uvular fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'pharyngeal', 'fricative', 'voiceless')"><?php echo getSymbol("C", "voiceless pharyngeal fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'pharyngeal', 'fricative', 'voiced')"><?php echo getSymbol("C", "voiced pharyngeal fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'glottal', 'fricative', 'voiceless')"><?php echo getSymbol("C", "voiceless glottal fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'glottal', 'fricative', 'voiced')"><?php echo getSymbol("C", "voiced glottal fricative"); ?></button></td>
                </tr>
                <tr>
                    <th scope="row">Lateral fricative</th>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'alveolar', 'lateral fricative', 'voiceless')"><?php echo getSymbol("C", "voiceless alveolar lateral fricative"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'alveolar', 'lateral fricative', 'voiced')"><?php echo getSymbol("C", "voiced alveolar lateral fricative"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                </tr>
                <tr>
                    <th scope="row">Approximant</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'labiodental', 'approximant', 'voiced')"><?php echo getSymbol("C", "voiced labiodental approximant"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'alveolar', 'approximant', 'voiced')"><?php echo getSymbol("C", "voiced alveolar approximant"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'retroflex', 'approximant', 'voiced')"><?php echo getSymbol("C", "voiced retroflex approximant"); ?></button></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'palatal', 'approximant', 'voiced')"><?php echo getSymbol("C", "voiced palatal approximant"); ?></button></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'velar', 'approximant', 'voiced')"><?php echo getSymbol("C", "voiced velar approximant"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                </tr>
                <tr>
                    <th scope="row">Lateral approximant</th>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'alveolar', 'lateral approximant', 'voiced')"><?php echo getSymbol("C", "voiced alveolar lateral approximant"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'retroflex', 'lateral approximant', 'voiced')"><?php echo getSymbol("C", "voiced retroflex lateral approximant"); ?></button></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'palatal', 'lateral approximant', 'voiced')"><?php echo getSymbol("C", "voiced palatal lateral approximant"); ?></button></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('C', 'velar', 'lateral approximant', 'voiced')"><?php echo getSymbol("C", "voiced velar lateral approximant"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                    <td class="table-active"></td>
                </tr>
            </tbody>
        </table>
    </div>



    
    <div class="rounded-3 fs-4 text-white" style="background-color: #2c3034; padding: 20px; <?php if($_GET["phonemeType"] == "C"){echo "display: none;";} ?>" name="vowelChart" id="vowelChart">
        <table class="table table-dark table-bordered table-sm" style="font-size: 15px;">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" colspan="2">Front</th>
                    <th scope="col" colspan="2">Near-Front</th>
                    <th scope="col" colspan="2">Central</th>
                    <th scope="col" colspan="2">Near-Back</th>
                    <th scope="col" colspan="2">Back</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Close</th>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'close', 'front', 'unrounded')"><?php echo getSymbol("V", "close front unrounded vowel"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'close', 'front', 'rounded')"><?php echo getSymbol("V", "close front rounded vowel"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'close', 'central', 'unrounded')"><?php echo getSymbol("V", "close central unrounded vowel"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'close', 'central', 'rounded')"><?php echo getSymbol("V", "close central rounded vowel"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'close', 'back', 'unrounded')"><?php echo getSymbol("V", "close back unrounded vowel"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'close', 'back', 'rounded')"><?php echo getSymbol("V", "close back rounded vowel"); ?></button></td>
                </tr>
                <tr>
                    <th scope="row">Near-Close</th>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'near-close', 'near-front', 'unrounded')"><?php echo getSymbol("V", "near-close near-front unrounded vowel"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'near-close', 'near-front', 'rounded')"><?php echo getSymbol("V", "near-close near-front rounded vowel"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'near-close', 'near-back', 'rounded')"><?php echo getSymbol("V", "near-close near-back rounded vowel"); ?></button></td>
                    <td></td>
                    <td></td>
                <tr>
                    <th scope="row">Close-Mid</th>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'close-mid', 'front', 'unrounded')"><?php echo getSymbol("V", "close-mid front unrounded vowel"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'close-mid', 'front', 'rounded')"><?php echo getSymbol("V", "close-mid front rounded vowel"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'close-mid', 'central', 'unrounded')"><?php echo getSymbol("V", "close-mid central unrounded vowel"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'close-mid', 'central', 'rounded')"><?php echo getSymbol("V", "close-mid central rounded vowel"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'close-mid', 'back', 'unrounded')"><?php echo getSymbol("V", "close-mid back unrounded vowel"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'close-mid', 'back', 'rounded')"><?php echo getSymbol("V", "close-mid back rounded vowel"); ?></button></td>
                </tr>
                <tr>
                    <th scope="row">Mid</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="table-active"><button class="btn btn-outline-primary" onclick="setInputs('V', 'mid', 'central', 'unrounded')"><?php echo getSymbol("V", "mid central unrounded vowel"); ?></button></td>
                    <td class="table-active"><button class="btn btn-outline-primary" onclick="setInputs('V', 'mid', 'central', 'rounded')"><?php echo getSymbol("V", "mid central rounded vowel"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Open-Mid</th>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'open-mid', 'front', 'unrounded')"><?php echo getSymbol("V", "open-mid front unrounded vowel"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'open-mid', 'front', 'rounded')"><?php echo getSymbol("V", "open-mid front rounded vowel"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'open-mid', 'central', 'unrounded')"><?php echo getSymbol("V", "open-mid central unrounded vowel"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'open-mid', 'central', 'rounded')"><?php echo getSymbol("V", "open-mid central rounded vowel"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'open-mid', 'back', 'unrounded')"><?php echo getSymbol("V", "open-mid back unrounded vowel"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'open-mid', 'back', 'rounded')"><?php echo getSymbol("V", "open-mid back rounded vowel"); ?></button></td>
                </tr>
                <tr>
                    <th scope="row">Near-Open</th>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'near-open', 'front', 'unrounded')"><?php echo getSymbol("V", "near-open front unrounded vowel"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="table-active"><button class="btn btn-outline-primary" onclick="setInputs('V', 'near-open', 'central', 'unrounded')"><?php echo getSymbol("V", "near-open central unrounded vowel"); ?></button></td>
                    <td class="table-active"><button class="btn btn-outline-primary" onclick="setInputs('V', 'near-open', 'central', 'rounded')"><?php echo getSymbol("V", "near-open central rounded vowel"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Open</th>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'open', 'front', 'unrounded')"><?php echo getSymbol("V", "open front unrounded vowel"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'open', 'front', 'rounded')"><?php echo getSymbol("V", "open front rounded vowel"); ?></button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'open', 'back', 'unrounded')"><?php echo getSymbol("V", "open back unrounded vowel"); ?></button></td>
                    <td><button class="btn btn-outline-primary" onclick="setInputs('V', 'open', 'back', 'rounded')"><?php echo getSymbol("V", "open back rounded vowel"); ?></button></td>
                </tr>
            </tbody>
        </table>
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
                            <option value="tap or flap">Tap or Flap</option>
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
                            <h1 class='display-3 text-primary'>Edit this Vowel</h1>
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