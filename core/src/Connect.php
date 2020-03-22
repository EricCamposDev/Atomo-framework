<?php
	

	/**
	* @category   Connect
	* @package    src.core
	* @author     Eric Campos
	* @copyright  2019 Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    2.0
	*/

	class Connect extends Atom {

		private $connection;
		private $db = [];

		public function __construct(){

			parent::__construct();
			$this->db["host"] = parent::getConfig("dbhost");
			$this->db["name"] = parent::getConfig("dbname");
			$this->db["user"] = parent::getConfig("dbuser");
			$this->db["pass"] = parent::getConfig("dbpass");

		}

		protected function get_instance() {

			try{
				$this->connection = new PDO("mysql:host=".$this->db["host"].";dbname=" . $this->db["name"], $this->db["user"], $this->db["pass"], array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
				$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->connection->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);

				return $this->connection;
			}catch(PDOException $e){
				return false;
			}
		}

		public function status(){
			if( !$this->get_instance() ){
				if( parent::getConfig("debug") ){
					CoreException::withoutConnection();
				}
			}
		}

	}
?>