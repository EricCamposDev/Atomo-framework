<?php
	

	/**
	* @category   AtomException
	* @package    src.AtomException
	* @author     Eric Campos
	* @copyright  2019 Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    2.0
	*/

	class AtomException {
		
		public static function moduleNotFound(){
			echo '
				<fieldset style="margin: 20px; text-align: center;">
					<legend>Modulo não encontrado</legend>
					<p>O modulo solicitado não foi encontrado</p>
				</fieldset>
			';
		}

		public static function fileNotFound(){
			echo '
				<fieldset style="margin: 20px; text-align: center;">
					<legend>Arquivo não encontrado</legend>
					<p>O arquivo solicitado não foi encontrado</p>
				</fieldset>
			';
		}

		public static function withoutConnection(){
			echo '
				<fieldset style="margin: 20px; text-align: center;">
					<legend>Banco de dados não conectado!</legend>
					<p>verifique no arquivo de configurações os dados de acesso ao banco de dados SQL</p>
				</fieldset>
			';
		}

	}
?>