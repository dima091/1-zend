<?php

class Application_Model_Site
{
	public function sayHello($name) {
		return 'Hello '.$name;
	}
	
	public function pages() {
		$this->db = Zend_Db_Table::getDefaultAdapter();
		return $this->db->query("SELECT page_name FROM pages")->fetchAll();
	}
	public function page_text($n) {
		$this->db = Zend_Db_Table::getDefaultAdapter();
		return $this->db->query("SELECT page_text FROM pages WHERE page_name = '$n'")->fetchAll();
	}
}




