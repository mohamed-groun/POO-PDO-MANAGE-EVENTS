<?php

require 'autoload.php';


$user = new utilisateurenattend();
$personnes = $user->select();
echo "<head>
    <title> Accueil</title>
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css\" integrity=\"sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO\" crossorigin=\"anonymous\">
</head>
<body class='container'>";
foreach ($personnes as $personne) {
    echo("vous voulez valider a " . $personne->prenom . " " . $personne->nom . " Emai : " . $personne->email . " " . " Numero de telephone" . $personne->telephone . ""
        . " 
 <a href=\"add-to-event.php?id=$personne->id\">oui</a>
" .
        "
 <a href=\"delete-user.php?id= $personne->id\">non</a><br>
</form>");

}
echo "</body>";