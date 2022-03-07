<?php

namespace Root\Html\Core;

use PDO;
use PDOException;

/**
 * DAO class are meant to be extended by concret DAO class.
 * It initiates the object to make the connection to the database
 * and force to implement CRUD methods 
 */
abstract class DAO implements CRUDInterface, RepositoryInterface {
	protected PDO $pdo;

	protected function __construct() {
		// read the config file and create an array containing the config data
		$config = json_decode(file_get_contents("config/database.json"), true);
		
		try {
			$this->pdo = new PDO(
				$config["driver"] 
				. ":host=" . $config["host"] 
				. ";port=" . $config["port"] 
				. ";dbname=" . $config["dbname"] 
				. ";charset=" . $config["charset"]
				, $config["username"]
				, $config["password"]
			);
		} catch (PDOException $e) {
			print "Error connection !: " . $e->getMessage() . "<br/>";
			die();
		}
	}
		
} 