<?php require_once './views/layouts/headerbackoffice.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mostrar Produto</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <h1>Mostrar Produto</h1>
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
                                <h3 class="card-title">Produto: <b><?=$produto->referencia?></b></h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Referencia</label>
                                        <input class="form-control" type="text" placeholder="<?= $produto->referencia ?>%" readonly>

                                        <label>Descrição</label>
                                        <input class="form-control" type="text" placeholder="<?= $produto->descricao ?>" readonly>

                                        <label>Preço</label>
                                        <input class="form-control" type="text" placeholder="<?= $produto->preco ?>" readonly>

                                        <label>Quantidade</label>
                                        <input class="form-control" type="text" placeholder="<?= $produto->stock ?>" readonly>

                                        <label>Taxa Iva</label>
                                        <input class="form-control" type="text" placeholder="<?= $produto->iva->percentagem ?> - <?= $produto->iva->descricao ?> " readonly>
                                    </div>
                                    <div class="col-12 mt-2 float-right">
                                        <a  href="router.php?c=produto&a=index" class="btn btn-dark float-right" type="submit">Voltar</a>
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
