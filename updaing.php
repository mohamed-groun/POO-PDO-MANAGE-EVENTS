<?php
require 'autoload.php';

$nom=htmlentities($_POST['nom']);
$photo=htmlentities($_POST['photo']);
$dateDebut=($_POST['dateDebut']);
$Emplacement=htmlentities($_POST['emplacement']);
$dateFin=htmlentities($_POST['dateFin']);
$nombreDePlace=htmlentities($_POST['nombreDePlace']);


$cnxPDO = ConnexionPDO2::getInstance();
$evenement= new evenment();
$evenement->updateEvent($nom,$photo,$dateDebut,$dateFin,$Emplacement,$nombreDePlace);



header('location:adminpage.php');
