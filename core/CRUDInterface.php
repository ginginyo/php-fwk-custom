<?php

namespace Root\Html\Core;

interface CRUDInterface {
	public function create(array $tab): object;
	public function retrieve(int $id): object;
	public function update(int $id, array $tab): bool;
	public function delete(int $id): bool;
}