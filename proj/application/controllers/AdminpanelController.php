<?php

class AdminpanelController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        if (Zend_Auth::getInstance()->hasIdentity()) {
			//$this->view->form = "admin";
			$this->view->layout()->form = "admin";
			$this->view->url = 1;
			$this->view->layout()->url = 1;
		}
		else {
			//$this->view->form = $form;
			$this->view->layout()->form = $form;
			$this->view->url = 0;
		}
		$ms = new Application_Model_Index();
		if (isset($_POST['title']) || isset($_POST['keywords']) || isset($_POST['description'])) {
			$ms->insert_meta($_POST['title'], $_POST['keywords'], $_POST['description']);
		}
		
		
		$msp = $ms->pages();
		$this->view->list = $msp;
		$msp = $ms->select_meta();
		$this->view->meta = $msp;
    }


}

