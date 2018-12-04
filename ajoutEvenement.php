
<?php
require 'autoload.php';

$nom=htmlentities($_POST['nom']);
$photo=htmlentities($_POST['photo']);
$dateDebut=($_POST['dateDebut']);
$dateFin=htmlentities($_POST['dateFin']);
$Emplacement=htmlentities($_POST['emplacement']);
$nombreDePlace=htmlentities($_POST['nombreDePlace']);

if(  empty($nom) || empty($photo) || empty($dateDebut) || empty($dateFin) || empty($Emplacement) || empty($nombreDePlace)  )
{
    echo " <b>You did not fill out the required fields </b>";
}


else {

    $evenment= new  evenment();
    $evenment->addEvent($nom,$photo,$dateDebut,$dateFin,$Emplacement,$nombreDePlace);
header('location:adminpage.php');
}
