<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./public/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="./public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./public/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- user Menu -->
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true">
                    (<?= $_SESSION['USER_USERNAME'] ?>)
                </a>
            </li>
            <li>
                <a class="nav-link" href="router.php?c=user&a=profile&id=<?= $_SESSION['USER_ID'] ?>">
                    <i class="fas fa-user"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="<?="router.php?c=auth&a=logout" ?>" role="button">
                    <i class="fas fa-sign-out-alt"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->

        <?php if(Auth::getUserLoggedRole() == 'administrador') { ?>
        <a href="<?="router.php?c=admin&a=index" ?>" class="brand-link">
            <img src="./public/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">  Fatura +</span>
        </a>
        <?php } else { ?>
            <a href="<?="router.php?c=funcionario&a=index" ?>" class="brand-link">
            <img src="./public/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">  Fatura +</span>
        </a>
       <?php } ?>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <?php if(Auth::getUserLoggedRole() == 'administrador') { ?>
                    <li class="nav-item">
                        <a href="<?="router.php?c=admin&a=index" ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">UTILIZADORES</li>
                    <li class="nav-item">
                        <a href="<?="router.php?c=user&a=index" ?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Gerir Utilizadores
                            </p>
                        </a>
                    </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a href="<?="router.php?c=funcionario&a=index" ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">UTILIZADORES</li>
                        <li class="nav-item">
                            <a href="<?="router.php?c=funcionario&a=create" ?>" class="nav-link">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>
                                    Criar Cliente
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?="router.php?c=funcionario&a=listaClientes" ?>" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Gerir Clientes
                                </p>
                            </a>
                        </li>
                  <?php  } ?>
                    <li class="nav-header">TAXAS DE IVA</li>
                    <li class="nav-item">
                        <a href="<?="router.php?c=iva&a=create" ?>" class="nav-link">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Criar Nova Taxa de Iva</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?="router.php?c=iva&a=index" ?>" class="nav-link">
                            <i class="nav-icon fas fa-percent"></i>
                            <p>Gerir Taxas de Iva</p>
                        </a>
                    </li>
                    <li class="nav-header">PRODUTOS</li>
                    <li class="nav-item">
                        <a href="<?="router.php?c=produto&a=create" ?>" class="nav-link">
                            <i class="fas  fa-plus-circle nav-icon"></i>
                            <p>Criar Novo Produto</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?="router.php?c=produto&a=index" ?>" class="nav-link">
                            <i class="fab fa-product-hunt  nav-icon"></i>
                            <p>Gerir Produtos</p>
                        </a>
                    </li>
                    <li class="nav-header">FATURAS</li>
                    <li class="nav-item">
                        <a href="<?="router.php?c=fatura&a=create" ?>" class="nav-link">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p class="text">Criar Fatura</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?="router.php?c=fatura&a=index" ?>" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Gerir Faturas</p>
                        </a>
                    </li>
                    <li class="nav-header">Empresa</li>
                    <li class="nav-item">
                        <a href="<?="router.php?c=empresa&a=index" ?>" class="nav-link">
                            <i class=" nav-icon fas fa-building"></i>
                            <p>Gerir Empresa</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->

        <!-- /.sidebar-custom -->
    </aside>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
