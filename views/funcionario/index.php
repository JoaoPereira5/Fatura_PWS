<?php require_once './views/layouts/headerbackoffice.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrador</title>
</head>
<body class="hold-transition sidebar-mini">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
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
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= FuncionarioController::actionTotalFaturasEmitidas() ?></h3>

                            <p>Total Faturas Emitidas pelo Funcionário: <?= $_SESSION["USER_USERNAME"]?></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="" class="small-box-footer"> <i class="fas"></i></a>
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= FuncionarioController::actionTotalFaturasCanceladas() ?></h3>

                            <p>Total Faturas Canceladas pelo Funcionário: <?= $_SESSION["USER_USERNAME"]?></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer"> <i class="fas"></i></a>
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <!-- small box -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3><?= AdminController::actionTotalProdutos()?></h3>

                            <p>Total Produtos com stock maior de "0"</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer"> <i class="fas"></i></a>
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <!-- small box -->
                    <div class="small-box bg-maroon">
                        <div class="inner">
                            <h3><?=AdminController::actionTotalTaxasIvaVigor() ?>
                            </h3>

                            <p>Total Taxas de Iva em Vigor</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer"><i class="fas"></i></a>
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?=AdminController::actionTotalTaxasIvaDesatualizadas() ?>
                            </h3>

                            <p>Total Taxas de Iva Desatualizadas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer"><i class="fas"></i></a>
                    </div>
                </div>

                <div class="col-lg-5 col-12">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= FuncionarioController::actionTotalClientesAtivos() ?></h3>
                            <p>Total Clientes Ativos</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer"> <i class="fas"></i></a>
                    </div>
                </div>

                <div class="col-lg-5 col-12">
                    <!-- small box -->
                    <div class="small-box bg-gradient">
                        <div class="inner">
                            <h3><?= FuncionarioController::actionTotalClientesBanidos() ?></h3>
                            <p>Total Clientes Banidos</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer"> <i class="fas"></i></a>
                    </div>
                </div>
                <div class="col-lg-5 col-12">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3><?= AdminController::actionEmpresa() ?></h3>
                            <p>Empresa Registada</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer"> <i class="fas"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
<?php require_once './views/layouts/footer.php'; ?>
