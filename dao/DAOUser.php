<?php

namespace Root\Html\Dao;

use PDO;
use Root\Html\Core\DAO;
use stdClass;

class DAOUser extends DAO {
	public function __construct() {
		parent::__construct();
	}

	/**
	 * get all users data to hydrate every User object
	 *
	 * @return array - array of User object
	 */
	public function getAll(): array {
		$stmt = $this->pdo->prepare("SELECT * FROM `person`");
		$stmt->execute();

		$users = $stmt->fetchAll(PDO::FETCH_CLASS, 'Root\\Html\\Models\\User');

		return $users;
	}

	public function getAllBy(array $tab): array {
		return array();
	}


	public function create(array $tab): object {
		return new stdClass();
	}

	public function retrieve(int $id): object {
		return new stdClass();
	}

	public function update(int $id, array $tab): bool {
		return false;
	}

	public function delete(int $id): bool {
		return false;
	}
}