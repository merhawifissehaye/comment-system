<?php

// View.php
namespace Core\MyFramework;

class View {

	protected $template = null;

	/**
	 * View constructor.
	 * @param null $template
	 */
	public function __construct($template)
	{
		$this->template = $template;
	}

	public function escape($data) {
		return htmlspecialchars((string)$data, ENT_QUOTES, 'UTF-8');
	}

	public function render(array $data = array()) {
		extract($data);

		ob_start();
		$path = BASE_DIR . 'views/' . $this->template . '.tmp.php';
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
}