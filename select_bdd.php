<?php 
include_once ('header/header.php'); 

$host=$_POST['host'];
$login= $_POST['login'];
$pwd=$_POST['password'];
$pdo = connect_db($host,$login,$pwd);

//Connection aux BDD (permettant de lister les BDDs)
//$bdd = mysqli_connect("localhost", "root","","");
//$sql = "show databases";

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
	//$showDB = mysqli_query($bdd,$sql);
	$sql = $pdo->query("show databases");

	//while($row = mysqli_fetch_assoc($showDB)){
	while($row = $sql->fetch()){
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







