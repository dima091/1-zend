<?php

class FirstController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
		//echo "first";
		$f = new Application_Model_First();
		$m = $f->sayHello('Dima!');
		$this->view->hello = $f->sayHello('Dima!');
    }


}

