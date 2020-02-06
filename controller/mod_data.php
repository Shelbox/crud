<script type="text/javascript">
console.log("debug, Appelle au controleur/model 'submit_mod_data'");	
</script>

<?php
include_once ('../header/header.php'); 
$pdo = pdo();

$sql = $_POST['sql'];
$stmt = $pdo->prepare($sql); 

if($stmt->execute()){
	echo "La requete est OK !";
}
else{
	echo "La requete est KO";
}

?>    




 