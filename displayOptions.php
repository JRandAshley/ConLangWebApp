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

    //echo getSymbol("C", "voiceless glottal plosive");
?>