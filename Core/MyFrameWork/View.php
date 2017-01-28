<?php

// View.php
namespace CommentSystem\Core\MyFramework;

class View {

	private $model;

	private $controller;

	private $layoutFilePath;

	public function __construct($controller, $model)
	{
		
		$this->controller = $controller;

		$this->model = $model;
	}

	public function render()
	{

		$content = file_get_contents("../view/" . $this->model->tableName . ".template.php");

		return $content;
	}

	/**
	 * @param mixed $layoutFilePath
	 */
	public function setLayoutFilePath($layoutFilePath)
	{
		$this->layoutFilePath = $layoutFilePath;
	}
}