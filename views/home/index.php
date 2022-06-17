<?php require_once './views/layouts/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cliente Home</title>
</head>
<body class="hold-transition sidebar-mini">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="lockscreen-wrapper">
                    <div class="lockscreen-logo">
                        <img src="./public/img/logo.png" alt="AdminLTE Logo" class="brand-image img-fluid img-circle elevation-3" style="opacity: .8">

                        <p>Bem vindo ao nosso Novo Sistema de Faturação :)</p>
                    </div>
                    <div class="help-block text-center">
                        <a  class="text-dark" href="<?="router.php?c=auth&a=getLogin" ?>"><strong>Inicie Sessão</strong></a> para poder usufruir deste maravilhoso sistema de Faturação!
                    </div>
                    <div class="text-center mb-5">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
<?php require_once './views/layouts/footer.php'; ?>
