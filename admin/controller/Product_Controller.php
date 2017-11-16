<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Product_Controller extends Base_Controller
{
    public function indexAction()
    {
        $this->view->load('product');
    }
}