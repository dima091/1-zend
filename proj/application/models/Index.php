<?php

class Application_Model_Index
{
	public function sayHello($name) {
		return 'Hello '.$name;
	}
	
	public function pages() {
		$this->db = Zend_Db_Table::getDefaultAdapter();
		return $this->db->query("SELECT page, page_name FROM pages")->fetchAll();
	}
	public function pages_name() {
		$this->db = Zend_Db_Table::getDefaultAdapter();
		return $this->db->query("SELECT page_name FROM pages")->fetchAll();
	}
	public function select_meta() {
		$this->db = Zend_Db_Table::getDefaultAdapter();
		return $this->db->query("SELECT * FROM meta")->fetchAll();
	}
	public function insert_meta($t, $k, $d) {
		$this->db = Zend_Db_Table::getDefaultAdapter();
		return $this->db->query("UPDATE meta SET id = 1, title = '$t', keywords = '$k', description = '$d' WHERE id=1");
		
	}
	public function page_text($n) {
		$this->db = Zend_Db_Table::getDefaultAdapter();
		return $this->db->query("SELECT page_text FROM pages WHERE page = '$n'")->fetchAll();
	}
	
}




