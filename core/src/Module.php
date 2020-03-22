<?php
	

	/**
	* @category   Module
	* @package    src.Module
	* @author     Eric Campos
	* @copyright  2019 Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    2.0
	*/

	class Module extends Atom {

		private $module;
		private $attrModules;

		public function __construct(){
			parent::__construct();
		}

		public function setModule( $module ){
			$this->module = parent::route('path')."/modules/".$module;
			if( file_exists($this->module) and is_dir($this->module) ){
				$this->module = $module;
				$this->attrModules = json_decode(file_get_contents(parent::route("path")."/modules/".$this->module."/define.json"));
			}else{
				CoreException::moduleNotFound();
				$this->module = parent::getConfig('default_module');
			}

			return $this;
		}

		public function default(){
			return parent::getConfig("default_module");
		}

		public function getModules($mod = null){
			$allModules = [];
			$_allModules = parent::scanDir("modules");
			foreach($_allModules as $md){
				$defineModule = file_get_contents(parent::route('path') . "/modules/" . $md . "/define.json");
				$mod = json_decode($defineModule, true);
				$allModules[$md] = $mod;
			}

			return $allModules;
		}

		public function execute(){
			# checking init application
			$security = parent::getSecurity();
			if( empty($security['console']) ){
				header("location: " . parent::route("index")."/console?install");
			}

			# generate uri module
			if( !parent::uri() ){
				parent::location("", $this->module);
			}

			$src = parent::route("path")."/modules/". $this->module;
			if( file_exists($src) ){				
				# include all class
				parent::includeAll($src . "/models");
				# include validate and helpers
				require $src . "/helpers.php";
				require $src . "/validate.php";

				# defined base
				if( file_exists($src."/define.json") ){
					$define = json_decode(file_get_contents($src."/define.json"));
					parent::run($define->base);
				}
			}else{

				if( parent::getConfig("debug") ){
					CoreException::moduleNotFound();
				}
			}
		}
	}
?>