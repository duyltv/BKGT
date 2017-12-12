<!DOCTYPE html>
<html class="no-js">
    <?php
    // Start the session

    ?>
    <head>
        <title><?php echo $data['title'];?></title>
        <!-- Bootstrap -->
        <link href="public/gui_design/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="public/gui_design/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="public/gui_design/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="public/gui_design/assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="public/gui_design/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>

    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Bach Khoa Grade Tracer</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <?php if (!isset($_SESSION['username'])) { ?>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> Đăng nhập <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu" style="width:350px">
                                    <li>
                                        <!--<a tabindex="-1" href="#">Profile</a>-->
                                        <form action="index.php?c=user&a=login" id="login_id" method="POST">
                                            <table>
                                                <tr>
                                                    <td>Tên đăng nhập: </td>
                                                    <td><input type="text" placeholder="Enter Username" name="username" required></td>
                                                </tr>
                                                <tr>
                                                    <td>Mật khẩu: </td>
                                                    <td><input type="password" placeholder="Enter Password" name="password" required></td>
                                                </tr>
                                            </table>
                                            <button type="submit" hidden>Submit</button>
                                        </form>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" onclick="document.getElementById('login_id').submit()">Đăng nhập</a>
                                    </li>
                                </ul>
                            </li>
                            <?php } else { ?>
                            Xin chào <?php echo $_SESSION['username'];?>. <a href="index.php?c=user&a=logout">Thoát</a>
                            <?php } ?>
                        </ul>
                        <ul class="nav">
                            <?php if (isset($_SESSION['role'])) {
                                if ($_SESSION['role']=='2') { ?>
                                    <li <?php if ($data['title'] == 'Quản lý môn học') echo 'class="active"' ?>>
                                        <a href="#">Quản lý môn học</a>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>