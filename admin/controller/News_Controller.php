<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class News_Controller extends BK_Controller
{
    public function indexAction()
    {
        // Lấy config có key là csrf_token_name
        echo '<h3>Token: csrf_token_name: ' . $this->config->item('csrf_token_name') . '</h3>';
         
        // Thay đổi giá trị cho csrf_token_name
        $this->config->set_item('csrf_token_name', 'new_token');
        echo '<h3>Token: csrf_token_name (changed): ' . $this->config->item('csrf_token_name') . '</h3>';
         
        // Tạo cấu hình mới tên website_name
        echo '<h3>key website_name: ' . $this->config->item('website_name') . '</h3>';
        $this->config->set_item('website_name', 'BachKhoa Grade Tracer 2');
        echo '<h3>key website_name: ' . $this->config->item('website_name') . '</h3>';
    }
}