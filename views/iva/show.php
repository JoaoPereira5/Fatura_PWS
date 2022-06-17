<?php require_once './views/layouts/headerbackoffice.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mostrar Iva</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <h1>Mostrar Iva</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Iva: <b><?=$iva->percentagem . '-'. $iva->descricao?></b></h3>
                            </div>
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <label>Taxa Iva</label>
                                            <input class="form-control" type="text" placeholder="<?= $iva->percentagem ?>%" readonly>

                                            <label>Descrição</label>
                                            <input class="form-control" type="text" placeholder="<?= $iva->descricao ?>" readonly>

                                            <label>Estado do Iva</label>
                                            <input class="form-control" type="text" placeholder="<?= $iva->vigor ?>" readonly>

                                        </div>
                                        <div class="col-12 mt-2 float-right">
                                            <a  href="router.php?c=iva&a=index" class="btn btn-dark float-right" type="submit">Voltar</a>
                                        </div>
                                    </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>
</body>
</html>
<?php require_once './views/layouts/footer.php'; ?>
