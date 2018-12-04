<?php

require 'autoload.php';
$id=$_GET['id'];

$user= new utilisateurenattend();
$utlisateurEnAttends=$user->selectByID($id);

foreach ($utlisateurEnAttends as $utlisateurEnAttend) {

    $email=trim($utlisateurEnAttend->email);
    $nom=trim($utlisateurEnAttend->nom);
    $prenom=trim($utlisateurEnAttend->prenom);
    $telephone=trim($utlisateurEnAttend->telephone);
    $event=trim($utlisateurEnAttend->event);


    $useraccpeted=new utilisateur();
    $useraccpeted->addUserA($email,$nom,$prenom,$telephone,trim($event));

    echo "faire ce qu il faut";
}




$user->deleteUser($id);

