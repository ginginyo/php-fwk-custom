<?php

namespace Root\Html\Core;

use PDO;
use PDOException;

abstract class DAO implements CRUDInterface, RepositoryInterface {
	protected PDO $pdo;

	public function __construct() {
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