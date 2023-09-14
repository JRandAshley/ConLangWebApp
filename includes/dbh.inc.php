<?php
//$dsn = "mysql:host=localhost;dbname=ConLang";
$serverName = "DESKTOP-F9M9UTM\CONLANSQLEXPRESS";
$database = "ConLang";
$uid = "";
$pass = "";

$connection = [
    "Database" => $database,
    "Uid" => $uid,
    "PWD" => $pass
];

$conn = sqlsrv_connect($serverName,$connection);
if(!$conn)
    die(print_r(sqlsrv_errors(),true));

// $tsql = "select * from tblPhonemes";

// $stmt = sqlsrv_query($conn,$tsql);

// if($stmt == false){
//     echo "Error";
// }
// else{
//     while($obj = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
//         echo $obj['PhonemeName']. '</br>';
//     }
// }

//sqlsrv_free_stmt($stmt);
//sqlsrv_close($conn);
?>