<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class User_Controller extends BK_Controller
{
    public function loginAction()
    {
        if(isset($_GET['username']))
        {
            $this->model->load('users');
            $users = $this->model->get('users');
            foreach($users as $user)
            {
                if($user['username'] == $_GET['username'] && $user['password'] == $_GET['password']) 
                {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['fullname'] = $user['fullname'];
                    $_SESSION['role'] = $user['role'];
                    //echo '<script type="text/javascript"> window.location = "index.php" </script>';
                    echo "Login success";
                    return;
                }
            }

            echo "Login failed";
            return;
        }
        echo "Login failed";
    }

    public function logoutAction()
    {
        session_unset();

        //echo '<script type="text/javascript"> window.location = "index.php" </script>';
        echo "Logged out";
        return;
    }

    public function addAction()
    {
        if(isset($_GET['username']))
        {
            $this->model->load('users');

            $dup_count = $this->model->get_count('users', 'id=\''.$_GET['id'].'\'')['soluong'];
            if ($dup_count > 0)
            {
                echo "User exist:";
                print_r($dup_count);
                return;
            }

            $data = array(
                'id' => $_GET['id'],
                'username' => $_GET['username'],
                'password' => $_GET['password'],
                'email' => $_GET['email'],
                'fullname' => $_GET['fullname'],
                'role' => $_GET['role'],
            );

            $this->model->insert('users',$data);
            echo "Added";
        }
    }

    public function deleteAction()
    {
        if(isset($_GET['id']))
        {
            $this->model->load('users');

            $data = array(
                'id' => $_GET['id']
            );

            $this->model->delete('users',$data);
            echo "Deleted";
        }
    }

    public function updateAction()
    {
        if(isset($_GET['id']))
        {
            $this->model->load('users');

            $data = array(
                'id' => $_GET['id'],
                'username' => $_GET['username'],
                'password' => $_GET['password'],
                'email' => $_GET['email'],
                'fullname' => $_GET['fullname'],
                'role' => $_GET['role'],
            );

            $this->model->update('users',$data);
            echo "Updated";
        }
    }
}