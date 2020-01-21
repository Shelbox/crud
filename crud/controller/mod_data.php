<script type="text/javascript">
console.log('debug', "Appelle au controleur/model 'submit_mod_data'");	
</script>

<?php
echo "$bdd";
$bdd = $_POST['bdd'];
$sql = $_POST['sql'];
try {
		$pdo = new PDO("mysql:host=localhost;dbname=$bdd", 'root', '' ,array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'') );
		$pdo->exec("SET lower_case_table_names=2");
		$pdo->exec("SET CHARACTER SET utf8");

	} catch ( PDOException $e ) {
		error_log ($e->getMessage ());
		print "Erreur de connection à la BDD: " .$e->getMessage(). "<br/>";
		die ();
	}


$stmt = $pdo->prepare($sql); 

if($stmt->execute())
{
	echo "La requete est OK !");
}
else
{
	echo "La requete est KO";
}
    



