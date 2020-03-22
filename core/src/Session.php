<?php
	

	/**
	* @category   Session
	* @package    src.session
	* @author     Eric Campos
	* @copyright  2019 Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    2.0
	*/

	class Session {

		public static function auth($name){
			@session_start();
			return ( isset($_SESSION[md5($name)]) ) ? true : false;
		}
 
		public static function new($name, $content){
			@session_start();
			if( !Session::auth($name) ){
				$_SESSION[md5($name)] = $content;
				return true;
			}else{
				return false;
			}
		}

		public static function get($name, $output = "array"){
			@session_start();
			//return ( Session::auth($name) ) ? $_SESSION[md5($name)] : false;
			return $_SESSION[md5($name)];
		}

	}
?>