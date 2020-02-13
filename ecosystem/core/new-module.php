<?php
	require dirname(dirname(__DIR__)) . "/core/bootstrap.php";
	$app = new Atom();

	function cleanDirName($name){
		return Helper::cleanString(str_replace(" ", "", str_replace(".zip","",$name)));
	}

	function permission($folder){
		$perm = new Atom();
		shell_exec("chmod -R 777 " . $perm->route('path') ."/" . $folder);
	}

	if( isset($_FILES['file_module']) and !empty($_FILES['file_module']['name']) ){
		# inciando zip do arquivo
		$file = $_FILES['file_module']['tmp_name'];
		$destiny = $app->route('path').'/modules/';
		$zip = new ZipArchive;
		$zip->open($file);
		permission("modules");
		if($zip->extractTo($destiny) == TRUE){
			permission("modules");
			# renomeando pasta do modulo
			rename($app->route('path')."/modules/".$_FILES['file_module']['name'], $app->route('path')."/modules/" . cleanDirName($_POST['name']));
			# define.json
			file_put_contents($app->route('path')."/modules/" . cleanDirName($_POST['name']) ."/define.json", json_encode($_POST));
			# redirect
			header("location: ../index.php");
		}else{
			# falha ao descompactar arquivo
		}
		$zip->close();
	}
?>