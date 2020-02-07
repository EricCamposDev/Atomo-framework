<?php
	

	/**
	* @category   Session
	* @package    src.session
	* @author     Eric Campos
	* @copyright  2019 Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    2.0
	*/

	class Session Extends Atom {

		private $authname;
		private $data = [];
		private $datelog;
		private $auth;

		public function auth( $name ) {

			@session_start();
			$this->authname = $name;

			if( isset($_SESSION[md5($this->authname)]) ){
				return true;
			}else{
				return false;
			}
		}

		public function set($data_log){

			if( $this->auth( $this->authname ) ){
				$this->data = (array) $this->get( $this->authname );
			}

			foreach( $data_log as $k => $v ){
				$this->data[$k] = $v;
			}

			return $this;
		}

		public function get( $name ){
			@session_start();
			return (object) $_SESSION[md5($name)];
		}

		public function end($name = null){
			@session_start();
			if( $name != null ){
				unset($_SESSION[$name]);
			}else{
				session_destroy();
			}
		}

		public function build(){
			@session_start();
			$_SESSION[md5($this->authname)] = $this->data;
		}

	}
?>