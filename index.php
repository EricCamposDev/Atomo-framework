<?php
	
	
	/**
	* @category   Index
	* @package    atomo.index
	* @author     Eric Campos
	* @copyright  2019 Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    2.0
	*/

	# autoload dependencies core
	require "core/bootstrap.php";

	# star application
	$app = new Atom();
	$app->debug();
	$app->timezone("America/Fortaleza");


	
	# check if exits mysql connection
	$connection = new Connect();
	$connection->status();
	$module = new Module();
	
	if( !$app->uri() ){
		$module->setModule( $module->default() )->execute();
	}else{
		$module->setModule( $app->uri(1) )->execute();
	}
	

	/*
	$log = new Session();
	if( $log->auth('user') ){
		if( !$app->uri() ){
			$module->setModule( $module->default() )->execute();
		}else{
			$module->setModule( $app->uri(1) )->execute();
		}
	}else{
		if( !$app->uri() ){
			$module->setModule( $module->default() )->execute();
		}else{
			$module->setModule( $app->uri(1) )->execute();
		}
	}
	*/
?>