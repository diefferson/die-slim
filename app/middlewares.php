<?php

$container['JsonOutputMiddleware']  = function($container) use ($app){
	return new Middlewares\JsonOutputMiddleware($container);
};