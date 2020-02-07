<?php
	

	/**
	* @category   bootstrap
	* @package    core
	* @author     Eric Campos
	* @copyright  2019 Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    2.0
	*/

	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL);

	require "src/Atom.php";
	require "src/Module.php";
	require "src/Connect.php";
	require "src/DBSQL.php";
	require "src/Session.php";
	require "src/AtomException.php";
	require "src/Helper.php";
	require "src/Import.php";
	require "src/Rest.php";
	require "src/Upload.php";
?>