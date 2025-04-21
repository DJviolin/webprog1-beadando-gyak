<?php
	include('./includes/config.inc.php');
	$oldal = $_SERVER['QUERY_STRING'];
	if ($oldal!="") {
		if (isset($APP_CONFIG['oldalak'][$oldal]) && file_exists("./templates/pages/{$APP_CONFIG['oldalak'][$oldal]['fajl']}.tpl.php")) {
			$keres = $APP_CONFIG['oldalak'][$oldal];
		}
		else {
			$keres = $APP_CONFIG['hiba_oldal'];
			header("HTTP/1.0 404 Not Found");
		}
	}
	else $keres = $APP_CONFIG['oldalak']['/'];
	include('./templates/index.tpl.php');
?>
