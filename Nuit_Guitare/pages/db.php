<?php

	$database = array (

		'HOST' => '',
		'USER' => '',
		'PASS' => '',
		'SITE' => '',

	);

    try {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

        $db = new PDO('mysql:host='.$database['HOST'].';dbname='. $database['SITE'] .';port=', $database['USER'], $database['PASS'], $pdo_options);

    }
    catch(Exception $e){
        die("Impossible d'accéder à la base de données.". $e);
    }
