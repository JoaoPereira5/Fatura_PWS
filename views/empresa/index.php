<?php require_once './views/layouts/headerbackoffice.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerir Empresa</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gerir Empresa</h1>
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
                                <h3 class="card-title">Lista Empresa</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                    </div>
                                </div>
                            </div>
                            <?php if($empresas == null){ ?>
                                <div class="null ml-5 mt-4">
                                    <h5>Não existe empresa registada na aplicação</h5>
                                </div>
                            <?php } else { ?>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Designação Social</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Telefone</th>
                                        <th scope="col">Nif</th>
                                        <th scope="col">Localidade</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($empresas as $empresa){?>
                                    <tr>
                                        <th scope="row" ><?= $empresa->id ?></th>
                                        <td><?= $empresa->designacaosocial ?></td>
                                        <td><?= $empresa->email ?></td>
                                        <td><?= $empresa->telefone ?></td>
                                        <td><?= $empresa->nif ?></td>
                                        <td><?= $empresa->localidade ?></td>
                                        <td><a class="btn btn-dark" href="router.php?c=empresa&a=show&id=<?=$empresa->id ?>"><i class="fas fa-eye" aria-hidden="true"> </i></a>
                                        </td>
                                        <td><a class="btn btn-dark" href="router.php?c=empresa&a=edit&id=<?=$empresa->id ?>"><i class="fas fa-pen" aria-hidden="true"> </i></a>
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

