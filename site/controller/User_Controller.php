<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class User_Controller extends BK_Controller
{
    public function loginAction()
    {
        if(isset($_POST['username']))
        {
            $this->model->load('users');
            $users = $this->model->get('users');
            foreach($users as $user)
            {
                if($user['username'] == $_POST['username'] && $user['password'] == $_POST['password']) 
                {
                    session_start();
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
        if(isset($_POST['username']))
        {
            $this->model->load('users');

            $dup_count = $this->model->get_count('users', 'id=\''.$_POST['id'].'\'')['soluong'];
            if ($dup_count > 0)
            {
                echo "User exist:";
                print_r($dup_count);
                return;
            }

            $data = array(
                'id' => $_POST['id'],
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'email' => $_POST['email'],
                'fullname' => $_POST['fullname'],
                'role' => $_POST['role'],
            );

            $this->model->insert('users',$data);
            echo "Added";
        }
    }

    public function deleteAction()
    {
        if(isset($_POST['id']))
        {
            $this->model->load('users');

            $data = array(
                'id' => $_POST['id']
            );

            $this->model->delete('users',$data);
            echo "Deleted";
        }
    }

    public function updateAction()
    {
        if(isset($_POST['id']))
        {
            $this->model->load('users');

            $data = array(
                'id' => $_POST['id'],
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'email' => $_POST['email'],
                'fullname' => $_POST['fullname'],
                'role' => $_POST['role'],
            );

            $this->model->update('users',$data);
            echo "Updated";
        }
    }
}