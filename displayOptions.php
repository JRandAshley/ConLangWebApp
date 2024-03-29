<?php
    $consonantIPASymbols = array(
        "voiceless bilabial plosive" => "p",
        "voiced bilabial plosive" => "b",
        "voiceless alveolar plosive" => "t",
        "voiced alveolar plosive" => "d",
        "voiceless retroflex plosive" => "&#648;",
        "voiced retroflex plosive" => "&#598;",
        "voiceless palatal plosive" => "c",
        "voiced palatal plosive" => "&#607;",
        "voiceless velar plosive" => "k",
        "voiced velar plosive" => "g",
        "voiceless uvular plosive" => "q",
        "voiced uvular plosive" => "G",
        "voiceless glottal plosive" => "&#660;",
        "voiced bilabial nasal" => "m",
        "voiced labiodental nasal" => "&#625;",
        "voiced alveolar nasal" => "n",
        "voiced retroflex nasal" => "&#627;",
        "voiced palatal nasal" => "&#626;",
        "voiced velar nasal" => "&#331;",
        "voiced uvular nasal" => "&#628;",
        "voiced bilabial trill" => "&#665;",
        "voiced alveolar trill" => "r",
        "voiced uvular trill" => "&#640;",
        "voiced labiodental tap or flap" => "&#11377;",
        "voiced alveolar tap or flap" => "&#638;",
        "voiced retroflex tap or flap" => "&#637",
        "voiceless bilabial fricative" => "&#632;",
        "voiced bilabial fricative" => "&#946;",
        "voiceless labiodental fricative" => "f",
        "voiced labiodental fricative" => "v",
        "voiceless dental fricative" => "&#952;",
        "voiced dental fricative" => "&#240;",
        "voiceless alveolar fricative" => "s",
        "voiced alveolar fricative" => "z",
        "voiceless postalveolar fricative" => "&#643;",
        "voiced postalveolar fricative" => "&#658;",
        "voiceless retroflex fricative" => "&#642;",
        "voiced retroflex fricative" => "&#656;",
        "voiceless palatal fricative" => "&#231;",
        "voiced palatal fricative" => "&#669;",
        "voiceless velar fricative" => "x",
        "voiced velar fricative" => "&#611;",
        "voiceless uvular fricative" => "&#967;",
        "voiced uvular fricative" => "&#641;",
        "voiceless pharyngeal fricative" => "&#295;",
        "voiced pharyngeal fricative" => "&#661;",
        "voiceless glottal fricative" => "h",
        "voiced glottal fricative" => "&#614;",
        "voiceless alveolar lateral fricative" => "&#620;",
        "voiced alveolar lateral fricative" => "&#622;",
        "voiced labiodental approximant" => "&#651;",
        "voiced alveolar approximant" => "&#633;",
        "voiced retroflex approximant" => "&#635;",
        "voiced palatal approximant" => "j",
        "voiced velar approximant" => "&#624;",
        "voiced alveolar lateral approximant" => "l",
        "voiced retroflex lateral approximant" => "&#621;",
        "voiced palatal lateral approximant" => "&#654;",
        "voiced velar lateral approximant" => "&#671;"
    );

    $vowelIPASymbols = array(
        "close front unrounded vowel" => "i",
        "close front rounded vowel" => "y",
        "close central unrounded vowel" => "&#616;",
        "close central rounded vowel" => "&#649;",
        "close back unrounded vowel" => "&#623;",
        "close back rounded vowel" => "u",
        "near-close near-front unrounded vowel" => "&#618;",
        "near-close near-front rounded vowel" => "&#655;",
        "near-close near-back rounded vowel" => "&#650;",
        "close-mid front unrounded vowel" => "e",
        "close-mid front rounded vowel" => "&#248;",
        "close-mid central unrounded vowel" => "&#600;",
        "close-mid central rounded vowel" => "&#629;",
        "close-mid back unrounded vowel" => "&#612;",
        "close-mid back rounded vowel" => "o",
        "mid central unrounded vowel" => "&#601;",
        "mid central rounded vowel" => "&#601;",
        "open-mid front unrounded vowel" => "&#603;",
        "open-mid front rounded vowel" => "&#339;",
        "open-mid central unrounded vowel" => "&#604;",
        "open-mid central rounded vowel" => "&#606;",
        "open-mid back unrounded vowel" => "&#652;",
        "open-mid back rounded vowel" => "&#596;",
        "near-open front unrounded vowel" => "&#230;",
        "near-open central unrounded vowel" => "&#592;",
        "near-open central rounded vowel" => "&#592;",
        "open front unrounded vowel" => "a",
        "open front rounded vowel" => "&#630;",
        "open back unrounded vowel" => "&#593;",
        "open back rounded vowel" => "&#594;"
    );

    $diacriticSymbols = array(
        "long" => "&#720;",
        "half-long" => "&#721;",

        "voiceless" => "&#805;",
        "voiced" => "&#812;",
        "aspirated" => "&#874;",
        "more-rounded" => "&#825",
        "less-rounded" => "&#796",
        "advanced" => "&#799",
        "retracted" => "&#800",
        "centralized" => "&#776",
        "mid-centralized" => "&#829",
        "syllabic" => "&#809",
        "non-syllabic" => "&#815",
        "rhoticity" => "&#",//find
        "breathy-voiced" => "&#804",
        "creaky-voiced" => "&#816",
        "linguolabial" => "&#828",
        "labialized" => "&#",//find
        "palatalized" => "&#",//find
        "velarized" => "&#",//find
        "pharyngealized" => "&#",//find
        "velarized-or-pharyngealized" => "&#820",
        "raised" => "&#797",
        "lowered" => "&#798",
        "advanced-tongue-root" => "&#792",
        "retracted-tongue-root" => "&#793",
        "dental" => "&#810",
        "apical" => "&#826",
        "laminal" => "&#827",
        "nasalized" => "&#771",
        "nasal-release" => "&#",//find
        "lateral-release" => "&#",//find
        "no-audible-release" => "&#"//find
    );

    function getSymbol($type, $name) {
        global $consonantIPASymbols;
        global $vowelIPASymbols;
        $symbol = "N/A";

        if($type == "C"){
            if(array_key_exists($name, $consonantIPASymbols)){
                $symbol = $consonantIPASymbols[$name];
            }
        }
        else if($type == "V"){
            if(array_key_exists($name, $vowelIPASymbols)){
                $symbol = $vowelIPASymbols[$name];
            }
        }

        return $symbol;
    }

    function getAdvancedSymbol($type, $name, $diacritics) {
        global $consonantIPASymbols;
        global $vowelIPASymbols;
        $symbol = "N/A";

        if($type == "C"){
            if(array_key_exists($name, $consonantIPASymbols)){
                $symbol = $consonantIPASymbols[$name];
            }
        }
        else if($type == "V"){
            if(array_key_exists($name, $vowelIPASymbols)){
                $symbol = $vowelIPASymbols[$name];
            }
        }

        return $symbol;
    }

    function orderForIPAChart($axis, $headers){
        $orderedArray = [];

        if($axis == "CP"){
            if(in_array("bilabial", $headers)){
                array_push($orderedArray, "bilabial");
            }
            if(in_array("labiodental", $headers)){
                array_push($orderedArray, "labiodental");
            }
            if(in_array("dental", $headers)){
                array_push($orderedArray, "dental");
            }
            if(in_array("alveolar", $headers)){
                array_push($orderedArray, "alveolar");
            }
            if(in_array("postalveolar", $headers)){
                array_push($orderedArray, "postalveolar");
            }
            if(in_array("retroflex", $headers)){
                array_push($orderedArray, "retroflex");
            }
            if(in_array("palatal", $headers)){
                array_push($orderedArray, "palatal");
            }
            if(in_array("velar", $headers)){
                array_push($orderedArray, "velar");
            }
            if(in_array("uvular", $headers)){
                array_push($orderedArray, "uvular");
            }
            if(in_array("pharyngeal", $headers)){
                array_push($orderedArray, "pharyngeal");
            }
            if(in_array("glottal", $headers)){
                array_push($orderedArray, "glottal");
            }
        } else if($axis == "VL"){
            if(in_array("front", $headers)){
                array_push($orderedArray, "front");
            }
            if(in_array("near-front", $headers)){
                array_push($orderedArray, "near-front");
            }
            if(in_array("central", $headers)){
                array_push($orderedArray, "central");
            }
            if(in_array("near-back", $headers)){
                array_push($orderedArray, "near-back");
            }
            if(in_array("back", $headers)){
                array_push($orderedArray, "back");
            }
        } else if($axis == "V"){
            echo("Vowel");
        }
        return $orderedArray;
    }
?>