<?php
abstract class ModeloBase 
{
	protected $db;

	public function __construct()
	{
		$this->db = SPDO::singleton();
	}
}
?>