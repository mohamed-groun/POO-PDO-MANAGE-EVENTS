<?php
require 'autoload.php';


$cnxPDO = ConnexionPDO2::getInstance();

if(isset($_GET['id']) ) {


    $id = $_GET['id'];
  $user = new utilisateurenattend();
  $user->deleteUser($id);

}


