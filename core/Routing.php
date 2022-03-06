<?php

namespace Root\Html\Core;

class Routing {
	/**
	 * URI parsed at the instanciation of the object
	 *
	 * @var array
	 */
	public array $uri;


	/**
	 * route parsed when is being tested
	 *
	 * @var array
	 */
	private array $route;


	/**
	 * method of the http request
	 *
	 * @var String
	 */
	private String $method;

	/**
	 * URI and route mapping retrieved from the config file at the instanciation of the object
	 *
	 * @var array
	 */
	private array $config;

	/**
	 * value (Controller:method) of the route found in the config
	 *
	 * @var String
	 */
	private String $controllerValue;

	/**
	 * arguments in the URI
	 *
	 * @var array
	 */
	private array $arguments;


	/**
	 * initiate config, uri, method when the Routing object is instanciated
	 */
	public function __construct() {
		$this->config = json_decode(file_get_contents("config/routing.json"), true);
		$this->uri = explode('/', $_SERVER['REQUEST_URI]']);
		$this->method = $_SERVER['REQUEST_METHOD'];
		$this->arguments = [];
	}


	/**
	 * this method is called for each http request and trigger the routing
	 *
	 * @return void
	 */
	public function execute(): void {
		// test all routes from the config 
		$routes = array_keys($this->config);
		foreach($routes as $route) {
			// parse the route
			$this->route = explode('/', $route);
			if($this->isEqual()) {
				if ($this->compare()) {
				 	$this->getControllerValue($route);					
					$this->invoke();
				}
			}
		}
	}

	/**
	 * compare the length of the uri and the route
	 *
	 * @return boolean
	 */
	public function isEqual(): bool {
		return count($this->uri) === count($this->route) ?  true : false;
	}

	/**
	 * select the controller value (Controller:method) in the config file corresponding to the route
	 *
	 * @return void
	 */
	public function getControllerValue($route) {
		// when the route has severals methods
		if(is_array($this->config[$route])) {
			$this->controllerValue = $this->config[$route][$this->method];
		}
		// when the route has only one method
		else {
			$this->controllerValue = $this->config[$route];
		}
	}

	/**
	 * add argument from URI when it exists
	 *
	 * @param String $index
	 * @return void
	 */
	public function addArgument(int $arg): void {
		array_push($this->arguments, $arg);
	}

	/**
	 * compare the URI array and the route array when theirs lengths are equal
	 *
	 * @return bool
	 */
	public function compare(): bool {		
		for($i = 0; $i < count($this->route); $i++) {
			// when the the parameter of the uri is correct
			if($this->route[$i] === $this->uri[$i] && $this->route[$i] !== "(:)") {
				continue;
			}
			// when the parameters of the uri is a number
			if ($this->route[$i] === "(:)" && is_numeric($this->uri[$i])) {
				$this->addArgument($this->uri[$i]);
				continue;
			}

			return false;
		}
		return true;
	}

	/**
	 * instantiate the controller and execute the method corresponding to the controllerValue found
	 *
	 * @return mixed
	 */
	public function invoke(): mixed {
		// separate the controller and its method to manipulate them
		$params = explode(':', $this->controllerValue);
		$controller = "Root\\Html\\Dao\\" . $params[0];
		$method = $params[1];

		// instanciate the controller with indirection
		$instance = new $controller();
		
		// when there is not argument
		if(empty($this->arguments)) {
			return $instance->$method();
		}
		// when there is some arguments
		else {
			return $instance->$method($this->arguments[0]);
		}
	}
}