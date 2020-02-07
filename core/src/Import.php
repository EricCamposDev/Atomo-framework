<?php
	

	/**
	* @category   Import
	* @package    src.Import
	* @author     Eric Campos
	* @copyright  2019 Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    2.0
	*/

	class Import extends Atom {

		private $output = [];

		public function __construct() {
			parent::__construct();
		}

		public function baseCSS() {

			$this->output[] = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css";
			$this->output[] = parent::route("index") . "/public/docs/css/docs.css";

			return $this;
		}

		public function baseJS() {
			
    		$this->output[] = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js";
    		$this->output[] = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js";
    		$this->output[] = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js";
    		$this->output[] = "https://kit.fontawesome.com/878d8bd672.js";
    		$this->output[] = parent::route("index") . "/public/docs/js/docs.js";

			return $this;
		}
		
		public function build() {
			# method of class Import
			if( count($this->output) >= 1 ){
				return $this->output;
			}else{
				return false;
			}
		}

	}
?>