<?php
if(Auth::getUserLoggedRole() == 'cliente') {
    require_once './views/layouts/headercliente.php';
} else {
    require_once './views/layouts/headerbackoffice.php';

} ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gerir Faturas</title>
    </head>
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Gerir Faturas</h1>
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
                                    <h3 class="card-title">Lista Faturas</h3>
                                    <div class="card-tools">
                                    </div>
                                </div>
                                <?php if($faturas == null){ ?>
                                    <div class="null ml-5 mt-4">
                                        <h5>Não existem faturas disponíveis</h5>
                                    </div>
                                <?php } else { ?>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Data</th>
                                            <th scope="col">Valor Total</th>
                                            <th scope="col">Estado da Fatura</th>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Funcionário</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($faturas as $fatura){?>
                                        <tr>
                                            <th scope="row" ><?= $fatura->id ?></th>
                                            <td><?= date("d-m-Y", strtotime($fatura->data)) ?></td>
                                            <td><?= sprintf('%.2f', $fatura->valortotal) ?></td>
                                            <td><?= $fatura->estado?></td>
                                            <td><?= $fatura->cliente->username?>
                                            <td><?= $fatura->user->username?></td>
                                            <td><a  class="btn btn-dark" href="router.php?c=fatura&a=mostrarFatura&fatura_id=<?=$fatura->id ?>"><i class="fa fa-eye" aria-hidden="true"> </i></a>
                                            </td>
                                            <td><a class="btn btn-dark" href="router.php?c=fatura&a=baixarPdf&fatura_id=<?=$fatura->id ?>"><i class="fa fa-download" aria-hidden="true"> </i></a>
                                            </td>
                                            <?php } }?>
                                        </tr>
                                        </tbody>
                                    </table>
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