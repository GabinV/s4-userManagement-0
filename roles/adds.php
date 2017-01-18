<html>
<head>
<?php
session_start();
require_once '../fonc_bdd.php';
$bdd = OuvrirConnexion($session, $usr, $mdp);
?>
</head>
<br/>
<body>
 <ul class="dropdown-menu">
		<li><a href="index.php">Index</a></li>
        <li><a href="show.php">Voir les roles</a></li>
        <li><a href="adds.php">Ajout</a></li>
        <li><a href="updates.php">Mise à jour</a></li>
		<li><a href="effacer.php">Effacer</a></li>
        </ul>
		<br/>
		
<fieldset>
 <form method="post">
    <p>
    <fieldset>
      <legend> Créer un role</legend>
             <label class="text-base" for="nom">Nom du role</label>
            <input type="text" name="nom" placeholder="Entrez le nom du role"/><br/><br/>
    </fieldset>

                <input class="btn btn-default" type="submit" name="valider" value="S'inscrire"/>
    </p>
</form
</fieldset>
</body>
</html>

<!--VERIFICATION DU FORMULAIRE-->
<?php
if (isset($_POST['valider'])) {
    $i = 1;

    if ((empty($_POST['nom']))) {
        $i = 0;
        $text = "Veuillez rentrer un identifiant";
		
	} else {
        $nbligne = $bdd->query('SELECT name FROM role WHERE name = \'' . $_POST['nom'] . '\' ');
        $nbligne = $nbligne->rowCount();
        if ($nbligne != 0) {
            $text = "Le nom du role existe déjà";
        }
	}
	
    if ($i == 1) {

        $nb = $bdd->query('SELECT max(id) as max FROM role');
        $nb = $nb->fetch();
        $bdd->exec('INSERT INTO role (id, name) 
					VALUES(
					 \'' . strip_tags($nb['max'] + 1) . '\',
					 \'' . strip_tags($_POST['nom']) . '\')');
					 
        echo "<p> Le compte à été ajouté </p>";

    }
}

?>


