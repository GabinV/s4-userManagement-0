<?php
session_start();
require_once '../fonc_bdd.php';
$bdd = OuvrirConnexion($session, $usr, $mdp);
?>
<html>
<head><TITLE>test</TITLE>
	<meta charset="utf-8">
	<script type="text/javascript" src="delete.js"></script>
</head>
<body>
 <ul class="dropdown-menu">
		<li><a href="index.php">Index</a></li>
        <li><a href="show.php">Voir les roles</a></li>
        <li><a href="adds.php">Ajout</a></li>
        <li><a href="updates.php">Mise à jour</a></li>
		<li><a href="delete.php">Effacer</a></li>
        </ul>
<br/><br/><br/>
<center>
<form method="post">
<?php
$sql = "select id , name from role";
$tab = AfficherTabCompte($sql, $bdd);
echo'<br/><br/>';

echo'<input class="btn btn-default" type="button" name="desc" value="Ordre"/>';

   function AfficherTabCompte($sql, $bdd){
	   
	 
    $tab = $bdd->query($sql,PDO::FETCH_ASSOC);
	echo '<table border="1">';
	echo '<tr> <td> IDENTIFIANT</td><td> NOM</td><td>Supprimer</td></tr>';
	foreach($tab as $utilisateur){
		
          echo "<tr>
                  <td>",$utilisateur['id'],"</td>
                  <td>",$utilisateur['name'],"</td>
				  <td><input class='btn btn-default' type='submit' name='supprimer_",$utilisateur['id'],"' value='Supprimer' id='val' onClick=\"getname(this)\"/></td>
                </tr>";
          }
		    echo '</table>';
  }
  
?>
<input type="checkbox" name="hidd" id="hid" value="" hidden>
<?php 
if(isset($_POST['hidd'])){
	$explode = explode("_",$_POST['hidd']);
    $id_user = $explode[1];
	echo $id_user;
	if($explode[0] == "supprimer"){
		$sql = "DELETE FROM role where id not in(select id from user where id= " .$id_user. ")";
		$bdd->exec($sql);
		echo "<meta http-equiv='refresh' content='0; url='" . $_SERVER['PHP_SELF'] . "'>";
	}
}
?>
</form>	
</center>
</body>
</html>