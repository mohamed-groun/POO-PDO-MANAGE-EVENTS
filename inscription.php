<?php


require 'autoload.php';


$cnxPDO = ConnexionPDO2::getInstance();



if (isset($_GET['id'])) {


    $id = $_GET['id'];


    $event= new evenment();
   $evenements= $event->selectByID($id);

}
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>inscription</title>
</head>
<body class="container">
<?php  foreach ($evenements as $evenement) {
    echo "Demande D inscript au : ".$evenement->nom;
?>
<br><br>

    <form action="inscrit.php" method="post">

            <div class="col">
                <label >E-mail</label>
                <input type="email" class="form-control"name="email">
            </div>
            <div class="col">
                <label >nom</label>
                <input type="text" class="form-control" name="nom">
            </div>

        <div class="col">
            <label >prenom</label>
            <input type="text" class="form-control" name="prenom">
        </div>

        <div class="col">
            <label >numeroDeTelephone</label>
            <input type="number" class="form-control" name="numeroDeTelephone">
        </div>
        <div class="col">
            <label >Evenement</label>
            <input type="text" class="form-control"name="event" value="<?=trim($evenement->nom)?>">
        </div>
        <br>
        <button type="submit" class="btn btn-info">Demande d inscrit </button>
    </form>
<?php }?>
</body>
</html>

