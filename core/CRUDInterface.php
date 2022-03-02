<?php

namespace Root\Html\Core;

interface CRUDInterface {
	public function create(array $tab): void;
	public function retrieve(int $id): mixed;
	public function update(int $id): bool;
	public function delete(int $id): bool;
}