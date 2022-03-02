<?php

namespace Root\Html\Dao;

use PDO;
use Root\Html\Core\DAO;

class DAOTest extends DAO {
	public function __construct() {
		parent::__construct();
	}

	public function create(array $tab): void {

	}

	public function retrieve(int $id): mixed {
	
	}


	public function update(int $id): bool {
		return false;
	}

	public function delete(int $id): bool {
		return false;
	}

	public function getAll(): array {
		$stmt = $this->pdo->prepare("SELECT * FROM `person`");
		$stmt->execute();

		$experiences = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $experiences;
	}

	public function getAllBy(array $tab): array	{
		return array();
	}
}