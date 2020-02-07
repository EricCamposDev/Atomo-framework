<?php


	/**
	* @category   Upload
	* @package    src.Upload
	* @author     Eric Campos
	* @copyright  2019 Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    2.0
	*/

	class Upload extends Atom {

		private $filename;
		private $destiny;
		
		public function __construct(){
			parent::__construct();
			$this->destiny = parent::route('path')."/storage/upload/";
			if( !file_exists($this->destiny) ){
				throw new Exception("Diretório de destino não encontrado, o sistema espera por: " . parent::route('index') . "/storage/upload/", 1);
			}
		}

		public function send($input){
			$this->filename = date('YmhHis');
			if( isset($_FILES[$input]['name']) and !empty($_FILES[$input]['name']) ){
				$extension = pathinfo($_FILES[$input]['name'], PATHINFO_EXTENSION);
				if( move_uploaded_file($_FILES[$input]['tmp_name'], $this->destiny . $this->filename . '.' . $extension ) ){
					return [
						'error' => false,
						'filename' => $this->filename . "." . $extension
					];
				}else{
					return [
						'error' => true,
						'message' => 'Falha ao realizar upload da imagem'
					];
				}
			}else{
				return [
					'error' => true,
					'message' => 'Não existe requisição do tipo FILE'
				];
			}
		}

		public function sendMultiple($files){

		}


	}
?>