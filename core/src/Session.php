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

		public function __construct(){
			parent::__construct();
		}

		public function auth( $name ) {

			session_start();
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
			if( $this->auth($name) ){
				return (object) $_SESSION[md5($name)];
			}else{
				return false;
			}
		}

		public function end($name = null){
			$this->auth();
			if( $name != null ){
				unset($_SESSION[$name]);
			}else{
				session_destroy();
			}
		}

		public function build(){
			$_SESSION[md5($this->authname)] = $this->data;
		}

	}
?>