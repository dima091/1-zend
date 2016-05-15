<?php

class AuthenticationController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }
	
	public function loginAction()
    {
		if (Zend_Auth::getInstance()->hasIdentity()) {
			$this->_redirect('/');
		}
		
		$form = new Application_Form_Admin();
		
		$request = $this->getRequest();
		if ($request->isPost()) {
			if ($form->isValid($this->_request->getPost())) {
		
				$AuthAdapter = $this->getAuthAdapter();
				$login = $form->getValue('login');
				$pass = $form->getValue('password');
		
				$AuthAdapter->setIdentity($login)
							->setCredential($pass);
							
				$auth = Zend_Auth::getInstance();
				$res = $auth->authenticate($AuthAdapter);
		
				if ($res->isValid()) {
					//echo 'valid';
					$identity = $AuthAdapter->getResultRowObject();
					$authStorage = $auth->getStorage();
					$authStorage->write($identity);
			
					$this->_redirect('/');
				}
				else {
					$this->view->errorM = "Login or password is wrong!";
				}
			}
		}
		
		$this->view->form = $form;
		
		/*$this->view->form = $form;
		
        $AuthAdapter = $this->getAuthAdapter();
		$login = 'a';
		$pass = 'b';
		
		$AuthAdapter->setIdentity($login)
					->setCredential($pass);
					
		$auth = Zend_Auth::getInstance();
		$res = $auth->authenticate($AuthAdapter);
		
		if ($res->isValid()) {
			//echo 'valid';
			$identity = $AuthAdapter->getResultRowObject();
			$authStorage = $auth->getStorage();
			$authStorage->write($identity);
			
			$this->_redirect('/');
		}
		else {
			echo 'invalid';
		}*/
    }
	
	public function logoutAction()
    {
		Zend_Auth::getInstance()->clearIdentity();
		$this->_redirect('/');
    }
	
	private function getAuthAdapter() {
		$AuthAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
		$AuthAdapter->setTableName('admin')
					->setIdentityColumn('login')
					->setCredentialColumn('password');
		return $AuthAdapter;
	}
	
}

