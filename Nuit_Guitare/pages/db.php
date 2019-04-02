<?php

	$database = array (

		'HOST' => '127.0.0.1',
		'USER' => 'root',
		'PASS' => '',
		'SITE' => 'patrimonio',

	);

    try {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

        $db = new PDO('mysql:host='.$database['HOST'].';dbname='. $database['SITE'] .';port=3306', $database['USER'], $database['PASS'], $pdo_options);

    }
    catch(Exception $e){
        die("Impossible d'accéder à la base de données.". $e);
    }
