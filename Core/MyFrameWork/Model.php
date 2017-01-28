<?php

// Model.php

namespace Core\MyFramework;

class Model {

	protected $id;

	protected $tableName;


	/**
	 * @param $tableName
     */
	public function setTableName($tableName)
	{
		$this->tableName = $tableName;
	}
}