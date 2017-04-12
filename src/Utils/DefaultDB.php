<?php
namespace Utils;

/**
 * @author - Diefferson Santos
*/
class DefaultDB{

	protected $pdo;
	protected $container;

	public function __construct($container){
		$this->pdo = $container->pdo;
		$this->container = $container;
	}
}