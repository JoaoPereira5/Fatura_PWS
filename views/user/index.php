<?php require_once './views/layouts/headerbackoffice.php'; ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gerir Utilizadores</title>
    </head>
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Gerir Utilizadores</h1>
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
                                    <h3 class="card-title">Lista Utilizadores</h3>

                                    <div class="card-tools">
                                    </div>
                                </div>
                                <div class="col-sm-5 col-md-7 mt-2">
                                    <div class="dt-buttons btn-group flex-wrap">
                                        <a href="router.php?c=user&a=create" class="btn btn-dark" type="submit">Criar Funcionário</a>
                                    </div>
                                    <div class="dt-buttons btn-group flex-wrap">
                                        <a href="router.php?c=funcionario&a=create" class="btn btn-dark" type="submit">Criar Cliente</a>
                                    </div>
                                </div>
                                    <?php if ($users == null){ ?>
                                        <div class="null ml-5 mt-4">
                                        <h5>Não foram encontrados utilizadores</h5>
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
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($users as $user){ ?>
                                        <tr>
                                            <th scope="row"><?= $user->id ?></th>
                                            <td><?= $user->username ?></td>
                                            <td><?= $user->email ?></td>
                                            <td><?= $user->telefone ?></td>
                                            <td><?= $user->nif ?></td>
                                            <td><?= $user->role ?></td>
                                            <td><?= $user->estado ?></td>
                                            <td><a class="btn btn-dark" href="router.php?c=user&a=show&id=<?= $user->id ?>"><i
                                                            class="fa fa-eye"
                                                            aria-hidden="true"> </i></a>
                                            </td>
                                            <td><a class="btn btn-dark" href="router.php?c=user&a=edit&id=<?= $user->id ?>"><i
                                                            class="fa fa-pen"
                                                            aria-hidden="true"> </i></a>
                                            </td>
                                            <?php
                                            if ($user->estado == 'ativo') { ?>
                                                <td><a class="btn btn-dark" href="router.php?c=user&a=banirUser&id=<?= $user->id ?>"><i
                                                                class="fa fa-unlock-alt" aria-hidden="true"> </i></a>
                                                </td>
                                            <?php } else { ?>
                                                <td><a class="btn btn-dark" href="router.php?c=user&a=ativarUser&id=<?= $user->id ?>"><i
                                                                class="fa fa-lock"
                                                                aria-hidden="true"> </i></a>
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