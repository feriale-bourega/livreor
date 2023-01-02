<?php

// Informations d'identification
// define ('DB_SERVER', 'localhost');
// define ('DB_USERNAME', 'root');
// define ('DB_PASSWORD', '');
// define ('DB_NAME', 'livreor');
$DB_SERVER ='localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'livreor';

// Connexion à la base de données MYSQL
$conn = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
// $conn = mysqli_connect('DB_SERVER','DB_USERNAME','DB_PASSWORD','DB_NAME');

// Vérifier la connexion
if($conn === false) {
    die ("ERREUR : Impossible de se connecter. " .
    mysqli_connect_error());
}
?>