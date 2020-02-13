<?php
	require dirname(dirname(__DIR__)) . "/core/bootstrap.php";

	$app = new Atom();
	file_put_contents($app->route('path') . "/core/config/config.json", json_encode($_POST));
	header("locaton: ../index.php");
?>