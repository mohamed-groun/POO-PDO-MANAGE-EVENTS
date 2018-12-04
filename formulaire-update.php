
<?php
require 'autoload.php';


$cnxPDO = ConnexionPDO2::getInstance();



if (isset($_POST['idToUpload'])) {


    $id = $_POST['idToUpload'];


    $event= new evenment();
   $evenements= $event->selectByID($id);


}
?>
    <html>
    <head>
        <title>formulaire</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container row">
    <?php
    foreach ($evenements as $evenement)
    {
        ?>


                <?php

                foreach ($evenements as $evenement)
                {
                    ?>
        <form  method="post" action="updaing.php">
                        <div class="card " >
                            <img class="card-img-top"  height="280px" width="300" src="<?= $evenement->photo ?>" alt="Card image cap">
                            <ul class="list-group list-group-flush">

                                <li class="list-group-item"> <input value="<?=$evenement->photo?>" name="photo"></li>
                                <li class="list-group-item"> <input value="<?=$evenement->nom ?>" name="nom"></li>
                                <li class="list-group-item"><input value="<?=$evenement->dateDebut ?>" name="dateDebut"></li>


                                <li class="list-group-item"><input value="<?=$evenement->dateFin ?>" name="dateFin"></li>
                                <li class="list-group-item"><input value="<?=$evenement->Emplacement ?>" name="emplacement"></li>
                                <li class="list-group-item"><input value="<?=$evenement->nombreDePlace ?>" name="nombreDePlace"></li>
                            </ul>


                    </div>
            <button class="btn btn-primary col"  type="submit" id="bouton_envoi">INSERT</button>
        </form>
                    <?php
                }
                ?>
            </div>

            <?php
    }
    ?>
    </div>
    </body>
    </html>

