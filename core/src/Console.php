<?php
	

	/**
	* @category   Atom
	* @package    src.Atom
	* @author     Eric Campos
	* @copyright  2019 Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    2.0
	*/

	class Console extends Atom {

		public function __construct(){
			parent::__construct();
		}

		public function checkExistUser($user){
			$security = parent::getSecurity();
			$keyUser = false;

			foreach($security['console'] as $key => $value){
				if( $value['user'] == $user ){
					$keyUser = $key;
				}
			}

			return $keyUser;
		}

		public function newUser($user, $pass){
			$security = parent::getSecurity();
			if( $this->checkExistUser($user) != false ){
				array_unshift($security['console'], ['user' => $user, 'pass' => md5($pass), 'log-console' => []]);
				file_put_contents(parent::route('path')."/core/config/security.json", json_encode($security));
				return [
					'error' => false,
					'code' => 200,
					'message' => 'Usuário registrado!'
				];
			}else{
				return [
					'error' => true,
					'code' => 300,
					'message' => 'Usuário ja existe'
				];
			}
		}

		public function newLog($user){
			$security = parent::getSecurity();
			$keyUser = $this->checkExistUser($user);
			if( $keyUser ){
				array_unshift($security['console'][$keyuser]['log-access'], [
					'ip' => $_SERVER['REMOTE_ADDR'],
					'browser' => $_SERVER['HTTP_USER_AGENT'],
					'datetime' => date('Y-m-d H:i:s')
				]);
				file_put_contents(parent::route('path')."/core/config/security.json", json_encode($security));
				return [
					'error' => false,
					'code' => 200,
					'message' => 'Novo log inserido'
				];
			}else{
				return [
					'error' => true,
					'code' => 404,
					'message' => 'Usuário não encontrado'
				];
			}
		}

		public function login($user, $pass){
			$security = parent::getSecurity();
			$keyUser = $this->checkExistUser($user);
			if( $keyUser ){
				# validando senha
				if( $security['console'][$keyuser]['pass'] == md5($pass) ){
					# login success
					$this->newLog($user);
					return [
						'error' => false,
						'code' => 200,
						'message' => 'login realizado com sucesso'
					];
				}else{
					# pass incorrect
					return [
						'error' => true,
						'code' => 350,
						'message' => 'senha incorreta'
					];
				}
			}else{
				# user not found
				return [
					'error' => true,
					'code' => 404,
					'message' => 'usuario não encontrado'
				];
			}
		}

	}
?>