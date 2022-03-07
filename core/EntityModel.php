<?php

namespace Root\Html\Core;


abstract class EntityModel implements Persistable {
	private int $id;
	private CRUDInterface $dao;

	/**
	 * compose EntityModel dao with the dao object you choose  
	 *
	 * @param CRUDInterface $dao
	 */
	protected function __construct(CRUDInterface $dao) {
		$this->$dao = $dao;
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function load() {
		$this->dao->retrieve($this->id);
	}

	/**
	 * Undocumented function
	 *
	 * @param array $tab
	 * @return void
	 */
	public function update(array $tab) {
		is_null($this->id) ? $this->dao->create($tab) : $this->dao->update($this->id, $tab); 
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function remove() {
		$this->dao->delete($this->id);
	}
}