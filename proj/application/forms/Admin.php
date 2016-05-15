<?php

class Application_Form_Admin extends Zend_Form
{

    public function init()
    {
		$this->setName('login');
		//$this->setAttrib('action', 'login');
		
		//$login1 = new Zend_Form_Element_Text('login');
		//$login1->setLabel('Login')->setRequired(true);
			  
		/*$password = new Zend_Form_Element_Text('password');
		$login->setLabel('Password')
			  ->setRequired(true);
			  
		$log = new Zend_Form_Element_Submit('log');
		$login->setLabel('Log');*/
		
		//$this->addElement($login1);
		$this->setMethod('post');
		$this->setAction('/authentication/login');
		
		$this->addElement('text','login', array(
			'label' => 'login',
			'required'   => true
		));
		$this->addElement('text','password', array(
			'label' => 'password',
			'required' => true
		));
		$this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Log in',
        ));
    }


}

