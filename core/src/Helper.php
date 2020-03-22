<?php
	

	/**
	* @category   Helper
	* @package    core.helper
	* @author     Eric Campos
	* @copyright  2019 Eric Campos
	* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
	* @version    2.0
	*/

	class Helper {

		public static function date($date, $mode){
			if( date('d/m/Y', strtotime($date)) == date('d/m/Y') ){
				switch( $mode ){
					case "d":
						return 'HOJE';
					break;
					case "dh":
						return 'HOJE, as ' . date('H:i', strtotime($date));
					break;
				}
			}else{
				switch( $mode ){
					case "d":
						return date('d/m/Y', strtotime($date));
					break;

					case "dh":
						return date('d/m/Y', strtotime($date))." as ".date('H:i', strtotime($date));
					break;

					case "fd":
						$pc = explode("-", $date);
						return $pc[2] . " de " . Helper::months($pc[1]) . " de " . $pc[0];
					break;
				}
			}
		}

		public static function convertMoney($money){
			$money = str_replace(",", "", $money);
			$piece = explode(".", $money);
			if( $piece[1] == "00" ){
				return $piece[0];
			}else{
				return $money;
			}
		}

		public static function months($k = null){
			$m['01'] = "Janeiro";
			$m['02'] = "Fevereiro";
			$m['03'] = "Março";
			$m['04'] = "Abril";
			$m["05"] = "Maio";
			$m["06"] = "Junho";
			$m["07"] = "Julho";
			$m["08"] = "Agosto";
			$m["09"] = "Setembro";
			$m["10"] = "Outubro";
			$m["11"] = "Novembro";
			$m["12"] = "Dezembro";
			return ($k == null) ? $m : $m[$k];
		}

		public static function dateStatic($date, $mode){
		
			switch( $mode ){
				case "d":
					return date('d/m/Y', strtotime($date));
				break;
				case "dh":
					return date('d/m/Y', strtotime($date))." as ".date('H:i', strtotime($date));
				break;
			}
		}

		public static function theme($src){
			$app = new Atom();
			return $app->route('index') . "/public/otika-bootstrap-admin-theme/" . $src;
		}

		public static function linkTokenMail($mail){
			$app = new Atom();
			return $app->route('index')."/modules/auth/controllers/confirm-mail-register.php?token=" . base64_encode(date('Ymd') . "##" . $mail);
		}

		public static function vtexmoney($money){
			return number_format($money,2);
		}

		public static function setID($id){
			return base64_encode($id);
		}

		public static function getID($id){
			return base64_decode($id);
		}

	
		public static function filterPostByPrefix($prefix){
			$response = [];
			foreach( $_POST as $k => $v ){
				$piece = explode("_", $k);
				if( $piece ){
					if( $piece[0] == $prefix ){
						$response[$k] = $v;
					}
				}
			}

			return $response;
		}

		public static function image($name){
			$defaultImg = "https://www.tibs.org.tw/images/default.jpg";
			$app = new Atom();
			$image['path'] = $app->route('path')."/storage/upload/". $name;
			$image['index'] = $app->route('index')."/storage/upload/". $name;
			if( file_exists($image['path']) and !is_dir($image['path']) ){
				return $image['index'];
			}else{
				return $defaultImg;
			}
		}

		public static function thumbProduct($content = ""){
			if( $content != null and $content != "" ){
				$foo = json_decode($content, true);
				if( is_array($foo) ){
					return Helper::image($foo[0]);
				}else{
					return Helper::image("");
				}
			}else{
				return Helper::image("");
			}
		}

		public static function loadImgPreview($foo = ""){
			$imgReturn = "";
			if( $foo != "" and $foo != null ){
				$arr = json_decode($foo, true);
				if( is_array($arr) ){
					foreach($arr as $kImg => $vImg){
						$imgReturn .= '<img src="'.Helper::image($vImg).'" width="200" height="200" />';
					}
				}
			}

			return $imgReturn;
		}

		public static function detailDesire($desire){
			// queria, gostaria, amaria, adoraria
			$all['queria'] = 'Queriamos <i class="far fa-smile-beam"></i>';
			$all['gostaria'] = 'Gostariamos <i class="far fa-laugh-wink"></i>';
			$all['amaria'] = 'Amariamos <i class="far fa-laugh-squint"></i>';
			$all['adoraria'] = 'Adorariamos <i class="far fa-grin-hearts"></i>';

			return $all[$desire];
		}

		public static function module($id_office = 0){
			switch ($id_office) {
				case 1:
					return 'admin';
				break;

				case 2:
					return 'user';
				break;

				case 3:
					return 'suporte';
				break;
				
				default:
					return 'auth';
				break;
			}
		}

		public static function cleanString($string){
		    return preg_replace(array("/(&)/","/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","e a A e E i I o O u U n N"),$string);
		}

		public static function notFound($title, $content){
			echo '<div class="card">
                  <div class="card-body">
                    <div class="empty-state" data-height="400">
                      <div class="empty-state-icon">
                        <i class="fas fa-question"></i>
                      </div>
                      <h2>'.$title.'</h2>
                      <p class="lead">
                        '.$content.'
                      </p>
                      <a href="#" class="btn btn-primary mt-4">Ir para o Inicio</a>
                      <a href="#" class="mt-4 bb">Precisa de ajuda?</a>
                    </div>
                  </div>
                </div>';
		}

		public static function stringUrl($string){
			$string = strtolower(Helper::cleanString($string));
			$string = str_replace(" ", "-", $string);

			return $string;
		}

	}