<?php 
include_once ('header/header.php'); 

//Connection aux BDD (permettant de lister les BDDs)
$bdd = mysqli_connect("localhost", "root","","");

$sql = "show databases";

?>


<table class="table table-striped table-bordered">
	<thead>
		<th>
			Base de données
		</th>
		<th>
			 Liens 
		</th>
	</thead>


	<tbody>
	<?php
	$showDB = mysqli_query($bdd,$sql);

	while($row = mysqli_fetch_assoc($showDB)){
	?>
		<tr>
			<td><?php echo($row['Database']); ?> </td>
			<td><a href="select_table.php?bdd=<?=$row['Database'];?>"/>Accès</td>
		</tr>
	<?php
	}

	?>
	</tbody>
</table>







