<?php 
namespace Utils;

use Slim\Container;

/**
 * @author - Diefferson Santos
*/
abstract class Middleware{
	
	protected $container;

	public function __construct(Container $container){
		$this->container = $container;
	}

	public function __get($key){
		if($this->container->{$key}){
			return $this->container->{$key};
		}
	}
}