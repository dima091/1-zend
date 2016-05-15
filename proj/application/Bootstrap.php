<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initDoctype()
    {
		$this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }
	protected function _initView()
    {
        Zend_Layout::startMvc();

        $options = $this->getOption('resources');
        $options = $options['view'];

        $view = new Zend_View($options);

        $view->headTitle()->setSeparator(' / ');

        $view->doctype()->setDoctype('XHTML1_STRICT');
        $view->headMeta()->setHttpEquiv('Content-Type', 'text/html; charset=' . $options['encoding']);

        $viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();
        $viewRenderer->setView($view);
        Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);

        $viewJs = (isset($options['js'])) ? $options['js'] : array();
        foreach ($viewJs as $name => $file) {
            $view->headScript()->appendFile($file);
        }

        $viewCss = (isset($options['css'])) ? $options['css'] : array();
        foreach ($viewCss as $name => $file) {
            $view->headLink()->appendStylesheet($file);
        }
		
		$navContainerConfig = new Zend_Config_Xml(APPLICATION_PATH.'/navigation.xml', 'nav');
		$navContainer = new Zend_Navigation($navContainerConfig);
		$view->navigation($navContainer);
		
        return $view;
    }
}
//<!--О компании-->

