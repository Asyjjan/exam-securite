<?php
include 'PDO.php';

$login = $_POST['identifiant'];
$mdp = $_POST['mdp'];

$result = $objPdo->query('SELECT * FROM `User` WHERE `User`.name = '.$login.'. AND `User`.mdp = '.$mdp.'');
$count = count($result);

if ($count > 0) {
    header("location: success.php");
}else{
    header("Location: denied.html");
}

?>