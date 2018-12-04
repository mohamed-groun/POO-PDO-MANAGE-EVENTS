<?php
session_start();
$login = $_POST['login'];
$psw = $_POST['psw'];
if (($login == "admin") && ($psw == "admin")) {
    $_SESSION['user'] = array
    ('username' => 'admin'
    );
    $destination = 'adminpage.php';
} else {
    $_SESSION['error'] = "LOGIN OU MOT DE PASSE D ADMINISTRATEUR INCORRECT";
    $destination = 'Accueil.php';

}
header("location:".$destination);