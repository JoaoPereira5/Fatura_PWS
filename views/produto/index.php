<?php require_once './views/layouts/headerbackoffice.php'; ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gerir Produtos</title>
    </head>
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Gerir Produtos</h1>
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
                                    <h3 class="card-title">Lista Produtos</h3>

                                    <div class="card-tools">

                                    </div>
                                </div>
                                <?php if($produtos == null){ ?>
                                    <div class="null ml-5 mt-4">
                                        <h5>Não existem produtos disponíveis</h5>
                                    </div>
                                <?php } else { ?>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Descrição</th>
                                            <th scope="col">Preço</th>
                                            <th scope="col">Quantidade</th>
                                            <th scope="col">Taxa Iva</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($produtos as $produto){?>
                                        <tr>
                                            <th scope="row" ><?= $produto->referencia ?></th>
                                            <td><?= $produto->descricao ?></td>
                                            <td><?= $produto->preco ?>€</td>
                                            <td><?= $produto->stock ?></td>
                                            <td><?= $produto->iva->percentagem ?> - <?= $produto->iva->descricao ?></td>

                                            <td><a class="btn btn-dark" href="router.php?c=produto&a=show&id=<?=$produto->id ?>"><i class="fa fa-eye" aria-hidden="true"> </i></a>
                                            </td>
                                            <td><a class="btn btn-dark" href="router.php?c=produto&a=edit&id=<?=$produto->id ?>"><i class="fa fa-pen" aria-hidden="true"> </i></a>
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