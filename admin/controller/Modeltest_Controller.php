<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Modeltest_Controller extends BK_Controller
{
    public function indexAction()
    {
        $this->model->load('users');
        $users = $this->model->get('users');
        print_r($users);

        $data_ = array(
            'id' => "51300414",
        );
        $this->model->delete('users',$data_);
        $users = $this->model->get('users');
        print_r($users);
    }
}