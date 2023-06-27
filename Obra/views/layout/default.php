<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./public/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="./public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="./public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="./public/assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./public/assets/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="./public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="./public/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="./public/assets/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- User Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header"><?=  $auth->getUsername();?></span>
                    <div class="dropdown-divider"></div>
                    <a href="index.php?c=definicoes&a=index" class="dropdown-item">
                        <i class="fas fa-cog mr-2"></i> Definições
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="index.php?c=login&a=logout" class="dropdown-item">
                        <i class="fas fa-sign-out-alt mr-2"></i> Terminar Sessão
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="./index.php?c=bo&a=index" class="brand-link">
            <img src="./public/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">OBRA</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="./public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?= $auth->getUsername(); ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <?php if(in_array($auth->getUserRole(), ['administrador','funcionario'])){ ?>
                    <li class="nav-item">
                        <a href="index.php?c=folhaobra&a=create" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Emissão Folha Obra
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?c=folhaobra&a=index" class="nav-link">
                            <i class="fas fa-folder"></i>
                            <p>
                                Folhas de Obra
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-bars"></i>
                            <p>
                                Gestão de Dados
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <?php } ?>
                        <ul class="nav nav-treeview">
                            <?php if(in_array($auth->getUserRole(), ['administrador'])){ ?>
                            <li class="nav-item">
                                <a href="index.php?c=funcionario&a=index" class="nav-link">
                                    <i class="fas fa-user"></i>
                                    <p>Funcionarios</p>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if(in_array($auth->getUserRole(), ['administrador','funcionario'])){ ?>
                            <li class="nav-item">
                                <a href="index.php?c=cliente&a=index" class="nav-link">
                                    <i class="fas fa-users"></i>
                                    <p>Clientes</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="index.php?c=servico&a=index" class="nav-link">
                                    <i class="fas fa-briefcase"></i>
                                    <p>Serviços</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?c=iva&a=index" class="nav-link">
                                    <i class="fas fa-tag"></i>
                                    <p>Iva</p>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if(in_array($auth->getUserRole(), ['administrador'])){ ?>
                            <li class="nav-item">
                                <a href="index.php?c=empresa&a=index" class="nav-link">
                                    <i class="fas fa-building"></i>
                                    <p>Empresa</p>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <?php require_once($viewPath); ?>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.1
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="./public/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="./public/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="./public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="./public/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="./public/assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="./public/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="./public/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="./public/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="./public/assets/plugins/moment/moment.min.js"></script>
<script src="./public/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="./public/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="./public/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="./public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="./public/assets/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="./public/assets/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./public/assets/js/demo.js"></script>
</body>
</html>
