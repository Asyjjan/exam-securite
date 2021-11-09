<?php
include 'PDO.php';

$result = $objPdo->query('SELECT * FROM `User`');
$login = $_POST['identifiant'];
$mdp = $_POST['mdp'];

if ($login != null && $mdp != null) {
foreach($result as $key){
    if($key['name'] == $login && $key['mdp'] == $mdp){
        header("location: success.php");
        }else{
            header("Location: denied.html");
        }
    }
}else{
    header("Location: denied.html");
}

?>