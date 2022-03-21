<?php


require("function/connection.php");
require("function/sql.php");
require("function/general.php");


try {
    $connection = connectDB();
} catch (Exception $ex) {
    die("ERREUR FATALE : " . $ex->getMessage() . "Erreur de connexion !");
}
?>
