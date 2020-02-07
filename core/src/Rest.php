<?php
	

	/**
	* @category   Rest
	* @package    core
	* @author     Eric Campos
	* @copyright  2019 Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    2.0
	*/

	class Rest extends Atom {

		private $curlConnect;
		private $methodRequest;
		private $urlRequest;
		private $headerRequest;
		private $contentRequest;

		public function __construct(){
			parent::__construct();
		}

		public function set($foo = []){
			$this->urlRequest = $foo["url"];
			$this->methodRequest = $foo["method"];
			$this->contentRequest = $foo["body"];
		}
		
		public function auth(){

			$this->curlConnect = curl_init();

			$this->headerRequest = [
					"Content-Type: application/json",
					"Authorization: Basic ZWNvbW1lcmNlLmNhc2FmcmVpdGFzOiNFY0NGcmVpdGFzQDIwMTk=",
					"Postman-Token: 76626aaf-c103-42fd-96c3-17fbb68d0cbd"
			];

			curl_setopt_array($this->curlConnect, [
				CURLOPT_URL => $this->urlRequest,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => $this->methodRequest,
				CURLOPT_POSTFIELDS => $this->contentRequest,
			 	CURLOPT_HTTPHEADER => $this->headerRequest,
			]);

			$responseConnection = curl_exec($this->curlConnect);
			$errorConnection = curl_error($this->curlConnect);
			curl_close($this->curlConnect);
			if ($errorConnection) {
			 	//return "cURL Error #:" . $err;
			 	return false;
			} else {
			 	return $responseConnection;
			}

		}

		
	}
?>