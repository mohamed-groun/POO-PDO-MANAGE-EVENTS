<?php

session_start();
if (!isset($_SESSION['user'])) {

    header("location:Accueil.php");}
else {
 require 'autoload.php';



$event = new evenment();
$evenements= $event->select();
?>
<!doctype html>
<html lang="en">
<head>

    <title> admin page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 <div class="col">
        <b> Bonjour Admin</b>
    </div>
    <div class="col-13">
        <a href="deconnexion.php" class="btn btn-primary " >Deconnection</a>
    </div>
</nav>
<br>
<div class="row">
<div class="col-3" style="background-color: #E6FFFB">

    <form class="needs-validation container form-container" action="ajoutEvenement.php" method="post" novalidate>

        <div class="col">
            <label><b>NEW EVENTS*</b></label>
            <input type="text" class="form-control"  name="nom" required>

        </div>
        <div class="col">
            <label ><b>PHOTO-NOM*</b></label>
            <input type="text" class="form-control"  name="photo"  required>

        </div>


        <div class="col">
            <label ><b>DATE DE DEBUT*</b></label>
            <input type="date" class="form-control"  name="dateDebut" required>

        </div>
        <div class="col">
            <label ><b>DATE DE FIN*</b></label>
            <input type="date" class="form-control"  name="dateFin"  required>

            <div class="col">
                <label ><b>Emplacement*</b></label>
                <input type="text" class="form-control"  name="emplacement" required>
            </div>
            <div class="col">
                <label ><b>NOMBRE DE PLACE*</b></label>
                <input type="number" class="form-control"  name="nombreDePlace" required>
            </div>


        </div><br><br>

        <div class="row">
            <button class="btn btn-primary col"  type="submit" id="bouton_envoi">INSERT</button>
            <button class="btn btn-danger col" type="reset">RESET</button>
        </div>
<br>
    </form>

        <form action="DELETE-Evenement.php" method="post">
            <b>ID OF EVENEMENT TO DELETE:</b> <input type="number" name="idToDelete" required>
            <input type="submit" name="delete" value="DELETE Event"  class="btn btn-danger">
        </form>
        <br>

        <form action="formulaire-update.php" method="post">
            <b>ID OF EVENEMENT TO UPDATE</b> <input type="number" name="idToUpload"required>
            <input type="submit"  class="btn btn-primary" name="update" value="UPDATE Event">
        </form> <br>

    <form action="valider-inscriptions.php" method="post">
    <input type="submit" class="btn btn-primary" value="valider les inscriptions">
    </form><br>



</div>
    <div class="col-9">

        <div class="container row">

            <?php

            foreach ($evenements as $evenement)
            {
                ?>
                <div class="col" style="height:100px" >
                    <div class="card " >
                        <img class="card-img-top"  height="280px" width="300" src="./img/<?=trim($evenement->photo )?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?=$evenement->nom ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?=$evenement->dateDebut ?></li>
                            <li class="list-group-item"><?= $evenement->dateFin ?></li>
                            <li class="list-group-item"><?=$evenement->Emplacement?></li>
                            <li class="list-group-item"><?=$evenement->nombreDePlace?></li>

                        </ul>

                    </div>
                </div>
                <?php
            }
            ?>
    </div>

</div>

</body>
</html>
<?php } ?>