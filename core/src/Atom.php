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
		private $security;
		private $dfserver;

		public function __construct() {
			# configuration
			$this->config = json_decode(file_get_contents(dirname(__DIR__)."/config/config.json"));
			$this->security = json_decode(file_get_contents(dirname(__DIR__)."/config/security.json"), true);
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

		public function getConfig( $key = null ){
			$return = (array) $this->config;
			if( $key != null ){

				
				if( isset( $return[$key] ) ){
					return $return[$key];
				}else{
					return false;
				}
			}else{
				return $return;
			}

		}

		public function setConfig($key = null, $value = null){
			if( $key == null or $value == null ){
				return false;
			}else{
				if( $this->getConfig($key) ){
					$cf = $this->getConfig();
					$cf[$key] = $value;
					file_put_contents($this->route('path')."/core/config/config.json", json_encode($cf));
					return true;
				}else{
					return false;
				}
			}
		}

		public function getSecurity( $key = null ){
			$return = (array) $this->security;
			if( $key != null ){
				if( isset( $return[$key] ) ){
					return $return[$key];
				}else{
					return false;
				}
			}else{
				return $return;
			}

		}

		public function setSecurity($key = null, $value = null){
			if( $key == null or $value == null ){
				return false;
			}else{
				if( $this->getSecurity($key) ){
					$scrt = $this->getSecurity();
					$scrt[$key] = $value;
					file_put_contents($this->route('path')."/core/config/security.json", json_encode($scrt));
					return true;
				}else{
					return false;
				}
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
					CoreException::fileNotFound();
				}
			}
		}

		public function include( $file ){
			$src = $this->route("path") . "/includes/" . $file . ".php";
			if( file_exists($src) ){
				require $src;
			}else{
				if( $this->config->debug ){
					CoreException::fileNotFound();
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

		public function scanDir($dir){
			$response = [];
			$path = $this->route('path')."/".$dir;
			if( file_exists($path) and is_dir($path) ){
				$dirFiles = dir($path);
				while( $file = $dirFiles->read() ){
					if( $file != "." and $file != ".." ){
						$response[] = $file;
					}
				}
			}

			return $response;
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
					CoreException::fileNotFound();
				}
			}	
		}

	}
?>