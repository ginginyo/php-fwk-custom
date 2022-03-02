<?php

namespace Root\Html\Core;

interface Persistable {
	public function load();
	public function update(array $tab);
	public function remove();
}