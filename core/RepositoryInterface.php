<?php

namespace Root\Html\Core;

interface RepositoryInterface {
	public function getAll(): array;
	public function getAllBy(array $tab): array;
}