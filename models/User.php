<?php

namespace Root\Html\Models;

class User {
	private String $name;
	private String $genre;

	public function getName(): String {
		return $this->name;
	}

	public function getGenre(): String {
		return $this->genre;
	}
}
