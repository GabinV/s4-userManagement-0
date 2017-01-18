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
	echo '<tr> <td> IDENTIFIANT</td><td> NOM</td></tr>';
	foreach($tab as $utilisateur){
		
          echo "<tr>
                  <td>",$utilisateur['id'],"</td>
                  <td>",$utilisateur['name'],"</td>
                </tr>";
          }
		    echo '</table>';
  }
  
  if (isset($_POST['desc'])) :
    $bdd->exec('select id, name from role order by id desc');
    echo "<meta http-equiv='refresh' content='0; url='" . $_SERVER['PHP_SELF'] . "'>";
	endif;
?>
</form>
</center>
</body>
</html>