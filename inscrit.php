<?php
require 'autoload.php';
$cnxPDO = ConnexionPDO2::getInstance();
$email=$_POST['email'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$tel=$_POST['numeroDeTelephone'];
$event=$_POST['event'];

$user= new utilisateur();
$evenements= $user->selectByEventAndEmail($email,$event);

if(  empty($nom) || empty($email) || empty($prenom) || empty($tel)   || empty($event)  )
{
    echo " <b>You did not fill out the required fields </b>";
}

if (empty($evenements))

    {
   $user = new utilisateurenattend();
   $user->addUser($email, $nom, $prenom, $tel, $event);
        echo "Merci de votre demande , attend notre reponce";
    }
    else
        echo"vous pouvez pas  inscript deux fois meme evenements";




