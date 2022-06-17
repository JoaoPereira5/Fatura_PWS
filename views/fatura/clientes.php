<?php require_once './views/layouts/headerbackoffice.php'; ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Selecionar Cliente</title>
    </head>
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Selecionar Cliente</h1>
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
                                    <h3 class="card-title">Lista Clientes</h3>

                                    <div class="card-tools">
                                        <form method="post" action="router.php?c=fatura&a=selecionarcliente">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                                <input type="text" name="table_search" class="form-control float-right"
                                                       placeholder="Search">

                                                <div class="input-group-append">
                                                    <button type="submit" name="btn_search" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php if ($clientes == null){ ?>
                                    <div class="null ml-5 mt-4">
                                        <h5>Não existem utilizadores Clientes na aplicação</h5>
                                    </div>
                                <?php } else { ?>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Telefone</th>
                                            <th scope="col">Nif</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($clientes as $cliente){ ?>
                                        <tr>
                                            <th scope="row"><?= $cliente->id ?></th>
                                            <td><?= $cliente->username ?></td>
                                            <td><?= $cliente->email ?></td>
                                            <td><?= $cliente->telefone ?></td>
                                            <td><?= $cliente->nif ?></td>
                                            <td><?= $cliente->role ?></td>
                                            <td><?= $cliente->estado ?></td>
                                            <td><a class="btn btn-dark" href="router.php?c=fatura&a=store&id=<?= $cliente->id ?>"><i
                                                            class="fa fa-plus-circle" aria-hidden="true"> </i></a>
                                            </td>
                                            <?php }
                                            } ?>
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