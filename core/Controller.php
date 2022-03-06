<?php

namespace Root\Html\Core;

abstract class Controller {
	private array $get;
	private array $post;

	protected function construct() {
		$this->get = $_GET;
		$this->post = $_POST;
	}

	/**
	 * generate and send the view with its content
	 *
	 * @param String $view - path of the view file
	 * @param array $data - data to inject in the view
	 * @return void
	 */
	final protected function render(String $view, array $data = null): void {
		extract($data);
		require('/views/' . $view . '.php');
	}

	protected function inputGet(): array {
		return $this->get;
	}

	protected function inputPost(): array {
		return $this->post;
	}
}