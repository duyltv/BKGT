<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class View_Controller extends BK_Controller
{
    public function indexAction()
    {
        $data = array(
            'title' => 'Chào mừng các bạn đến với freetuts.net'
        );
         
        // Load view
        $this->view->load('view', $data);
         
        // Show view
        $this->view->show();
    }
}