<?php require_once './views/layouts/headerbackoffice.php'; ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gerir Taxas de Iva</title>
    </head>
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Gerir Taxas de Iva</h1>
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
                                    <h3 class="card-title">Lista Taxas de Iva</h3>

                                    <div class="card-tools">

                                    </div>
                                </div>
                                <?php if ($ivas == null){ ?>
                                    <div class="null ml-5 mt-4">
                                        <h5>Não existem taxas de iva disponíveis</h5>
                                    </div>
                                <?php } else { ?>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Percentagem</th>
                                            <th scope="col">Descrição</th>
                                            <th scope="col">Estado do Iva</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($ivas as $iva){ ?>
                                        <tr>
                                            <th scope="row"><?= $iva->id ?></th>
                                            <td><?= $iva->percentagem ?>%</td>
                                            <td><?= $iva->descricao ?></td>
                                            <td><?= $iva->vigor ?></td>
                                            <td><a class="btn btn-dark" href="router.php?c=iva&a=show&id=<?= $iva->id ?>"><i
                                                            class="fa fa-eye" aria-hidden="true"> </i></a>
                                            </td>
                                            <td><a class="btn btn-dark" href="router.php?c=iva&a=edit&id=<?= $iva->id ?>"><i
                                                            class="fa fa-pen" aria-hidden="true"> </i></a>
                                            </td>
                                            <?php
                                            if ($iva->vigor == 'sim') { ?>

                                                <td><a class="btn btn-dark" href="router.php?c=iva&a=naovigor&id=<?= $iva->id ?>"><i
                                                                class="fa" aria-hidden="true">Desatualizar Taxa Iva</i></a>
                                                </td>
                                            <?php } else { ?>
                                                <td><a class="btn btn-dark" href="router.php?c=iva&a=emvigor&id=<?= $iva->id ?>"><i
                                                                class="fa " aria-hidden="true">Atualizar Taxa Iva</i></a>
                                                </td>
                                            <?php }
                                            }
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