<?php

class MySQL extends ParentSQL{

	public $link;

	public function __construct()
	{
		parent::__construct();
		$this->link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		mysql_set_charset('utf8',$this->link);
		mysql_select_db(DB_NAME);
	}
	
	public function insertRow()
	{
		parent::insertRow();
		if(mysql_query($this->query, $this->link)){
			return true;
		} else {
			$this->errors[] = mysql_error($this->link);
			return false;
		}
	}

	public function selectRows()
	{
		parent::selectRows();
		if($sqlResource = mysql_query($this->query, $this->link)){
		} else {
			$this->errors[] = mysql_error($this->link);
			return false;
		}
		while ($row = mysql_fetch_assoc($sqlResource)) {
			$result[] = $row;
		}
		return $result;
	}

	public function updateRow()
	{
		parent::updateRow();
		if(mysql_query($this->query, $this->link)){
			return true;
		} else {
			$this->errors[] = mysql_error($this->link);
			return false;
		}
	}

	public function deleteRow()
	{
		parent::deleteRow();
		if(mysql_query($this->query, $this->link)){
			return true;
		} else {
			$this->errors[] = mysql_error($this->link);
			return false;
		}
	}
	
	public function __destruct(){
		mysql_close($this->link);
	}
}