<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Teacher_Controller extends BK_Controller
{
    private function check_exist_record($data = array(), $user_id, $semester_id)
    {
        foreach($data as $row)
        {
            if ($row['user_id'] == $user_id && $row['semester_id'] == $semester_id)
            {
                return True;
            }
        }

        return False;
    }
    private function convert_scoretable_to_printable($data = array())
    {
        $data_ = array();
        foreach($data as $row) 
        {
            if ($this->check_exist_record($data_, $row['user_id'], $row['semester_id']))
            {
                $end_row = array_pop($data_); // Because input array's data is ordered by SQL
                $end_row[$row['element_name']] = $row['score'];
                $data_[] = $end_row;
            }
            else
            {
                $append_row = array(
                    'semester_id' => $row['semester_id'],
                    'user_id' => $row['user_id'],
                    'fullname' => $row['fullname'],
                    $row['element_name'] => $row['score']
                );
                $data_[] = $append_row;
            }
        }

        return $data_;
    }
    public function subjectsAction()
    {
        // Please check login before go to this page
        if(isset($_SESSION['username']))
        {
            $this->model->load('users');

            $subjects = $this->model->get_subjects_by_user_id($_SESSION['username']);

            $data = array(
                'title' => 'Quản lý môn học',
                'subjects' => $subjects
            );
            $this->view->load('004_1_teacher_subject_list', $data);
            $this->view->show();
        }
    }

    public function scoresAction()
    {
        if(isset($_GET['subject_id']))
        {
            $this->model->load('users');

            $score_table = $this->model->get_score_list_by_subject($_GET['subject_id']);

            $scores = $this->convert_scoretable_to_printable($score_table);

            $data = array(
                'title' => 'Quản lý môn học',
                'scores' => $scores
            );
            $this->view->load('xxx_xxx', $data);
            $this->view->show();
        }
    }

    public function typeAction()
    {
        if(isset($_GET['subject_id']))
        {
            $this->model->load('subjects');

            $elements_table = $this->model->get_element_list_by_subject($_GET['subject_id']);

            $elements = array();

            foreach($elements_table as $element_tb) 
            {
                $elements[] = $element_tb['name'];
            }

            print_r($elements);
        }
    }
}