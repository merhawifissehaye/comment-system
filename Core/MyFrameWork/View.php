<?php

// View.php
namespace Core\MyFramework;

use Core\MyRouter\FrontController;

class View
{
	public static function render($template, array $data = array())
	{
		extract($data);

		if(isset($_SESSION['_redirect_data'])) {

			extract($_SESSION['_redirect_data']);
		}

		unset($_SESSION['_redirect_data']);

		$route = FrontController::$route;

		// get view template
		ob_start();
		$path = BASE_DIR . 'views/' . $template . '.tmp.php';
		include($path);
		$yield = ob_get_contents();
		ob_end_clean();

		// get layout file
		ob_start();
		$path = BASE_DIR . 'views/layout.tmp.php';
		if(file_exists($path)) {
			include($path);
		} else {
			echo $yield;
		}
		$content = ob_get_contents();
		ob_end_clean();

		echo $content;
	}

	public static function redirect($location, $data = array())
	{
		if(is_array($data) && !empty($data)) {
			$_SESSION['_redirect_data'] = $data;
		}
		header("Location: $location");
	}
}