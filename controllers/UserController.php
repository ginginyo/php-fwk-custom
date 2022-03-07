<?php

namespace Root\Html\Controllers;

use Root\Html\Core\Controller;
use Root\Html\Dao\DAOUser;

class UserController extends Controller {

	public function __construct() {
		parent::construct();
	}

	/**
	 * generate and render the list of the users with data retrieved with the DAO
	 *
	 * @return void
	 */
	public function getUsers() {
		$data = array("users"=> (new DAOUser())->getAll());
		$this->render("liste_users", $data);
	}

}