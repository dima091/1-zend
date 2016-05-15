<?php

class SiteController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
		$this->db = Zend_Db_Table::getDefaultAdapter();
    }

    public function indexAction()
    {
        // action body
		//$this->view->hello = $f->sayHello('Dima!');
		//$tab = $this->db->query("SELECT * FROM fio")->fetchAll();
		//$this->view->tab = $tab;
		
		if (isset($_GET['n']))
			$n = $_GET['n'];
		else
			$n = "Главная";
		$ms = new Application_Model_Site();
		$msp = $ms->pages();
		$this->view->menu = $msp;
		$content = $ms->page_text($n);
		$this->view->content = $content;
		$form = new Application_Form_Admin();
		$this->view->form = $form;
		//var_dump($tab);
    }
	
	public function loginAction() 
	{
		$this->view->content = "login";
	}

}

