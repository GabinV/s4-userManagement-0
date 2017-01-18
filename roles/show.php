<?php
session_start();
require_once '../fonc_bdd.php';
$bdd = OuvrirConnexion($session, $usr, $mdp);
?>
<html>
<head><TITLE>test</TITLE>
	<meta charset="utf-8">
</head>
<body>
 <ul class="dropdown-menu">
		<li><a href="index.php">Index</a></li>
        <li><a href="show.php">Voir les roles</a></li>
        <li><a href="adds.php">Ajout</a></li>
        <li><a href="updates.php">Mise à jour</a></li>
		<li><a href="effacer.php">Effacer</a></li>
        </ul>
<br/><br/><br/>
<center>
<form method="post">
<?php
$sql = "select name from role";
$tab = AfficherTabCompte($sql, $bdd);
echo'<br/><br/>';

   function AfficherTabCompte($sql, $bdd){
	   
	 
    $tab = $bdd->query($sql,PDO::FETCH_ASSOC);
	echo '<table border="1">';
	echo '<tr><td>ROLE</td></tr>';
	foreach($tab as $utilisateur){
		
          echo "<tr>
                  <td>",$utilisateur['name'],"</td>
                </tr>";
          }
		    echo '</table>';
  }
  
?>
</form>	
</center>
</body>
</html>