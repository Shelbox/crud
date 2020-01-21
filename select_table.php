<?php 
include_once ('header/header.php'); 
$select_bdd = $_GET['bdd'];

//Connection à la BDD 
$bdd = mysqli_connect("localhost", "root","",$select_bdd);

$sql = "SELECT TABLE_NAME 
FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_SCHEMA='$select_bdd'";


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
	$getTable = mysqli_query($bdd,$sql);

	while($row = mysqli_fetch_assoc($getTable)){
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








