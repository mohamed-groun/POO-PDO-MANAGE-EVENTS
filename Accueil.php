<?php
session_start();
require 'autoload.php';

$cnxPDO = ConnexionPDO2::getInstance();

$event= new evenment();
$evenements= $event->select();

?>
<html>
<head>
    <title> Accueil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<!-- Image and text -->
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="./img/go-my-code.png" width="30" height="30" class="d-inline-block align-top" alt="">
        GOMYDODE-Events
    </a>
    <form method="post" action="connexionadmin.php">
        <div class="form-row align-items-center">
            <div class="col-sm-3 my-1">
                <label class="sr-only" for="inlineFormInputName" >Name</label>
                <input type="text" class="form-control" name="login" id="inlineFormInputName" placeholder="LOGIN">
            </div>
            <div class="col-sm-3 my-1">
                <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                <div class="input-group">

                    <input type="password" class="form-control" name="psw" id="inlineFormInputGroupUsername" placeholder="PASSWORD">
                </div>
            </div>
            <div class="col-auto my-1">

            </div>
            <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</nav><br>
<?php
if(isset($_SESSION['error']))
{
?>
<div class="alert alert-danger"> <?php echo $_SESSION['error'];
    unset($_SESSION['error']);
    ?></div>
<?php } ?>
<form action="inscription.php" method="post">

<div class="container row">

    <?php

foreach ($evenements as $evenement)
{

    $requete2 = "SELECT * FROM `utilisateurs` WHERE `event`='".$evenement->nom."'";
$res = $cnxPDO->prepare($requete2);
$res -> execute(array());


   // $user= new utilisateur();
   // $res= $user->selectByEvent($evenement->nom);
?>
    <div class="col" >
<div class="card " >
    <img class="card-img-top"  height="280px" width="300" src="./img/<?= trim($evenement->photo) ?>" alt="Card image cap">
<div class="card-body"">
        <h5 class="card-title"><?=$evenement->nom ?></h5>
</div>

    <ul class="list-group list-group-flush">
        <li class="list-group-item"> Date de debut:<?=$evenement->dateDebut ?></li>
        <li class="list-group-item">Date de fin : <?= $evenement->dateFin ?></li>
        <li class="list-group-item">Emplacement: <?=$evenement->Emplacement?></li>
        <li class="list-group-item">Nombre de place Total:<?=$evenement->nombreDePlace?></li>


        <li class="list-group-item">Nombre de place Restant:<?=$evenement->nombreDePlace-$res -> rowCount();?></li>
    </ul>
    <div class="card-body">
        <a href="inscription.php?id=<?=$evenement->id?>">INSCRIPTION</a>

    </div>


</div>
    </form>
    </div>
<?php
}
?>
</div>
</body>
</html>