<?php

const DATABASE = ['HOST' => '127.0.0.1', 'USER' => 'root', 'PASS' => '', 'SITE' => 'patrimonio',];

function accesBdd()
	{
		try {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

        $db = new PDO('mysql:host='.DATABASE['HOST'].';dbname='. DATABASE['SITE'] .';port=3306', DATABASE['USER'], DATABASE['PASS'], $pdo_options);
        return $db;

    	}
    		catch(Exception $e){
        	die("Impossible d'accéder à la base de données.".$e);
    	}
	}

?>
