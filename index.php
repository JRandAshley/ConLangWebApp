<?php
    session_start();
    unset($_SESSION["language"]);
    require 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Language Selection Page</title>
    <link rel="stylesheet" type="text/css" href="css/conlang.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body class="container" style="background-color:black; margin-top:20px;">
    <h1 class="display-1 text-primary">This is the language selection page.</h1>

    <?php
    echo <<<GFG
        <div class="rounded-3 fs-4 text-white col" style="background-color: #2c3034; display: inline-block; padding: 20px; margin: 20px;">
            <form method='get' action='./phonemeOverview.php'>
                <div style="flex-direction: column;">
    GFG;

    $tsql = "select * from tblLanguages";

    $stmt = sqlsrv_query($conn,$tsql);
    
    if($stmt == false){
        echo "Error";
    }
    else{
        while($obj = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
            echo '<div>';
            echo '<input type="radio" class="btn-check" name="languageID" id="'.$obj['LanguageName'].'" value="'.$obj['LanguageID'].'" autocomplete="off">';
            echo '<label class="btn btn-outline-primary" for="'.$obj['LanguageName'].'">'.$obj['LanguageName'].'</label>';
            echo '</div>';
        }
    }

    echo <<<GFH
                <input type='submit'>
                </div>   
            </form>
        </div>
    GFH;
    ?>
</body>
</html>