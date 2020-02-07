<?php
	

	/**
	* @category   Atom
	* @package    src.Atom
	* @author     Eric Campos
	* @copyright  2019 Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    2.0
	*/

	class Atom {

		private $config;
		private $dfserver;

		public function __construct() {
			# configuration
			$this->config = json_decode(file_get_contents(dirname(__DIR__)."/config/config.json"));
			$this->dfserver["path"] = $_SERVER["DOCUMENT_ROOT"];
			$this->dfserver["index"] = $_SERVER["SERVER_NAME"];
		}

		public function debug(){
			ini_set('display_errors',1);
			ini_set('display_startup_erros',1);
			error_reporting(E_ALL);
		}

		public function timezone($timezone){
			return date_default_timezone_set($timezone);
		}

		public function route( $param = "" ){
			if( $param == "" ){
				return $this->config->protocol . "://" . $this->dfserver["index"] . $this->config->folder;
			}else{
				switch( $param ){
					case "path":
						return $this->dfserver["path"] . $this->config->folder;
					break;

					case "index":
						return $this->config->protocol . "://" . $this->dfserver["index"] . $this->config->folder;
					break;

					default: 
						return $this->config->protocol . "://" . $this->dfserver["index"] . $this->config->folder;
					break;
				}
			}
		}

		protected function getConfig( $key ){
			
			$return = (array) $this->config;
			if( isset( $return[$key] ) ){
				return $return[$key];
			}else{
				return false;
			}

		}

		public function uri( $key = null ){
			if( $key == null ){
				if( isset($_GET['route']) ){
					return explode("/", $_GET['route']);
				}else{
					return false;
				}
			}else{
				if( isset($_GET['route']) ){
					$pieces = explode("/", @$_GET['route']);
					if( $pieces ){
						return $pieces[$key - 1];
					}else{
						return false;
					}
				}else{
					return false;
				}
			}
		}

		public function page($file, $module = ""){
			$module = ($module == "" or $module == null) ? $this->uri(1) : $module;
			$src = $this->route("path") . "/modules/" . $module . "/views/" . $file .".php";
			if( file_exists($src) ){
				# include
				require $src;
			}else{
				if( $this->config->debug ){
					# falha ao encontrar arquivo
					AtomException::fileNotFound();
				}
			}
		}

		public function include( $file ){
			$src = $this->route("path") . "/includes/" . $file . ".php";
			if( file_exists($src) ){
				require $src;
			}else{
				if( $this->config->debug ){
					AtomException::fileNotFound();
				}
			}
		}

		public function controller($file, $module = ""){
			$module = ($module == "" or $module == null) ? $this->uri(1) : $module;
			return $this->route("index") . "/modules/" . $module . "/controllers/" . $file .".php";
		}

		public function view($segment, $module = ""){
			$module = ($module == "" or $module == null) ? $this->uri(1) : $module;
			return $this->route("index") . "/" . $module . "/" . $segment;
		}

		public function location($segment, $module = ""){
			$uri = ($this->uri()) ? $this->uri(1) : $this->config->default_module;
			$module = ($module == "" or $module == null) ? $uri : $module;
			header("location: " . $this->route("index") . "/" . $module . "/" . $segment);
		}

		
		public function includeAll( $folder ){

			if( file_exists($folder) ){

				$dir = dir($folder);
				while( $file = $dir->read() ){
					if( $file != "." and $file != ".." ){
						require $folder."/".$file;
					}
				}

			}else{
				return false;
			}
			
		}

		public function getModels($module = null){

			if( $module == null ){
				$moduleDefined = $this->getConfig("default_module");
			}else{
				$moduleDefined = $module;
			}

			$path = $this->route('path')."/modules/".$moduleDefined."/models";
			if( file_exists($path) and is_dir($path) ){
				$dirModels = dir($path);
				while( $file = $dirModels->read() ){
					if( $file != "." and $file != ".." ){
						require $path . "/" .$file;
					}
				}
			}
		}



		public function run( $fileApp ){
			$fileApp = $this->route("path")."/app/".$fileApp.".php";
			if( file_exists($fileApp) ){
				require $fileApp;
			}else{
				if( $this->config->debug ){
					AtomException::fileNotFound();
				}
			}	
		}

	}
?>