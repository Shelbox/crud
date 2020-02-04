<?php 
include_once ('header/header.php'); 
//MYSQL
conf_db($_GET,FALSE);

$pdo = pdo(); 
echo "1";
//$pdo->query( "use $conf['db']" );
echo "2";
/*
//Connection à la BDD 
$bdd = mysqli_connect("localhost", "root","",$select_bdd);

$sql = "SELECT TABLE_NAME 
FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='$select_bdd'";*/


?>
<table class="table table-striped table-bordered">
	<thead>
		<th>
			Nom table
		</th>
		<th>
			 
		</th>
	</thead>


	<tbody>
	<?php
	//$getTable = mysqli_query($bdd,$sql);
	$sql = $pdo->query("SELECT TABLE_NAME 
						FROM INFORMATION_SCHEMA.TABLES
						WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='$select_bdd'");

	while($row = $sql->fetch()){
	?>
		<tr>
			<td ><?php echo($row['TABLE_NAME']); ?> </td>
			<td align="middle"><a href="action_on_table.php?bdd=<?=$select_bdd?>&table=<?=$row['TABLE_NAME'];?>" />Selectionner</td>
		</tr>
	<?php
	}

	?>
	</tbody>
</table>

<form>
  <input type="button" class="btn btn-danger" value="Retour" onclick="history.back()">
</form>








