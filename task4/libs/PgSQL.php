<?php

class PgSQL extends ParentSQL{

	public $link;

	public function __construct()
	{
		parent::__construct();
		$this->link = pg_connect("host=".DB_HOST." port=5432 dbname=".DB_NAME." user=".DB_USER." password=".DB_PASSWORD);
	}

	public function selectRows()
	{
		parent::selectRows();
		$sqlResource = pg_query($this->link, $this->query);
		while ($row = pg_fetch_assoc($sqlResource)) {
			$result[] = $row;
		}
		return $result;
	}

	public function insertRow()
	{
		parent::insertRow();
		return pg_query($this->link, $this->query);
	}

	public function updateRow()
	{
		parent::updateRow();
		return pg_query($this->link, $this->query);
	}

	public function deleteRow()
	{
		parent::deleteRow();
		return pg_query($this->link, $this->query);
	}
	
	public function __destruct(){
		pg_close($this->link);
	}
}