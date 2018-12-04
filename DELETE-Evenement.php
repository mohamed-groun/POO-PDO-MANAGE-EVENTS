<?php
require 'autoload.php';


$event= new evenment();
$evenements= $event->select();
if(isset($_POST['idToDelete']) ) {


    $id =$_POST['idToDelete'];
    $evenement= new evenment();
    $evenement->deleteEvent($id);

    }

header('location:adminpage.php');
