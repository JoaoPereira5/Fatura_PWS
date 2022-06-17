<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="./public/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./public/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
            <a href="<?="router.php?c=cliente&a=index" ?>" class="navbar-brand">
                <img src="./public/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Fatura +</span>
            </a>
            <div class="collapse navbar-collapse order-3">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?="router.php?c=cliente&a=faturaCliente" ?>" class="nav-link">Minhas faturas</a>
                    </li>
                </ul>
            </div>

            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true">
                        (<?= $_SESSION['USER_USERNAME'] ?>)
                    </a>
                </li>
                <li class="nav-item ml-0">
                    <a class="nav-link ml-0" data-widget="control-sidebar" data-slide="true" href="router.php?c=user&a=profile&id=<?= $_SESSION['USER_ID'] ?>" role="button">
                        <i class="fas fa-user"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="<?="router.php?c=auth&a=logout" ?>" role="button">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /.navbar -->
</div>

</body>
</html>

