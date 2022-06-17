<?php require_once './views/layouts/headercliente.php'; ?>
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Seja muito bem vindo ao <strong>Fatura +</strong></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row ml-5">
                <div class="col-lg-5 col-12">
                    <!-- small box -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3><?= ClienteController::actionTotalFaturasEmitidas() ?></h3>

                            <p>Total Faturas Emitidas do Cliente: <?= $_SESSION["USER_USERNAME"]?></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="" class="small-box-footer"> <i class="fas"></i></a>
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <!-- small box -->
                    <div class="small-box bg-gradient">
                        <div class="inner">
                            <h3><?= ClienteController::actionTotalFaturasCanceladas() ?></h3>

                            <p>Total Faturas Canceladas do Cliente: <?= $_SESSION["USER_USERNAME"]?></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer"> <i class="fas"></i></a>
                    </div>
                </div>
                <div class="col-lg-5 col-12">

                </div>
                <div class="col-lg-5 col-12">

                </div>
                <div class="col-lg-5 col-12">

                </div>

                <div class="col-lg-5 col-12">

                </div>

                <div class="col-lg-5 col-12">

                </div>
                <div class="col-lg-5 col-12">

                </div>
            </div>

        </div>

    </section>
</div>
</body>
</html>
<?php require_once './views/layouts/footer.php'; ?>
