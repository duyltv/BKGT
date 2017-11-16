<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
/**
 * @package     BK_Framework
 * @author      Freetuts Dev Team
 * @email       freetuts.net@gmail.com
 * @copyright   Copyright (c) 2015
 * @since       Version 1.0
 * @filesource  system/core/BK_Controller.php
 */
class BK_Controller
{
    // Đối tượng view
    protected $view     = NULL;
     
    // Đối tượng model
    protected $model    = NULL;
     
    // Đối tượng library
    protected $library  = NULL;
     
    // Đối tượng helper
    protected $helper   = NULL;
     
    // Đối tượng config
    protected $config   = NULL;
     
    /**
     * Hàm khởi tạo
     * 
     * @desc    Load các thư viện cần thiết
     */
    public function __construct() 
    {
        // Loader cho config
        require_once PATH_SYSTEM . '/core/loader/BK_Config_Loader.php';
        $this->config   = new BK_Config_Loader();
        $this->config->load('config');
    }
}