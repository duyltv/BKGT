<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Teacher_Controller extends BK_Controller
{
    public function subjectsAction()
    {
        // Please check login before go to this page
        session_start();
        if(isset($_SESSION['username']))
        {
            $this->model->load('users');

            $subjects = $this->model->get_subjects_by_user_id($_SESSION['username']);

            print_r($subjects);
        }
    }
}