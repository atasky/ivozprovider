<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    public function _initRouter()
    {
        $front = Zend_Controller_Front::getInstance();
        $restRoute = new Zend_Rest_Route($front, array(), array('userweb'));
        $front->getRouter()->addRoute('userweb', $restRoute);
    }

}
