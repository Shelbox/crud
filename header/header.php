<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<!-- DataTable / Jquery / Bootstrap -->
	    <script type="text/javascript" src='https://code.jquery.com/jquery-3.3.1.js'></script>
	    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	    <script type="text/javascript" src='https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js'></script>
	    <script type="text/javascript" src='https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js'></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
	    <!-- For icons -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head> 

<?php
function pdo()
{
	$conf = parse_ini_file ("DB.ini");
	
	if (isset($conf['db'])) 
	{
		$db = ";dbname=".$conf['db'];
		$host = $conf['host'].$db;

		$pdo = connect_db($host,$conf['login'],$conf['password']);
	}
	else
		$pdo = connect_db($conf['host'],$conf['login'],$conf['password']);
	
	
	return $pdo;
}

function connect_db($host,$login,$pwd)
{
  
    try {
        $dsn = "mysql:host=" . $host . ";charset=utf8";
        $pdo = new PDO ( $dsn, $login, $pwd );
        return $pdo;
    } 
    catch ( PDOException $e ) 
    {
            echo "Erreur !: " . $e->getMessage () . "<br/>";
            die ();
    }
    
}

function conf_db($data, $clean_file=TRUE)
{
	$path = "header/DB.ini";

	if ($clean_file) 
	{
			$file = fopen($path, "w");
		
			foreach ($data as $key => $value) 
			{
				if($key == "host")
				{
					fwrite($file, "host ='".$value."'\n");
				}
				else if($key == "password")
				{
					fwrite($file, "password ='".$value."'\n");
				}
				else if($key == "login")
				{
					fwrite($file, "login ='".$value."'\n");
				}
				
			}

			fclose($file);
	}
	else if (!$clean_file)
	{
		$file = fopen($path, "a");
		fwrite($file, "db ='".$data['db']."'\n");
		fclose($file);
	}

}

?>