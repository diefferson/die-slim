<?php

// Home
$container['HomeController']  = function($container) use ($app){
	return new Controllers\HomeController($container);
};