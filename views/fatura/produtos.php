<?php require_once './views/layouts/headerbackoffice.php'; ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Selecionar Produto</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Selecionar Produto</h1>
                        </div>
                        <?php if(!empty($erro))  { ?>
                            <input type="button" value="0"  id="clickme" style="display:none;" data-toggle="modal" data-target="#exampleModal" />
                            <!-- Modal -->
                            <div class="modal fade show" id="exampleModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-danger">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Atenção</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><?=$erro?></p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                        <?php }?>
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
                                        <form method="post" action="router.php?c=linhafatura&a=selecionarprodutos&fatura_id=<?=$fatura->id ?>">
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
                                <?php if ($produtos == null){ ?>
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
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($produtos as $produto){ ?>
                                        <tr>
                                            <th scope="row"><?= $produto->referencia ?></th>
                                            <td><?= $produto->descricao ?></td>
                                            <td><?= $produto->preco ?>€</td>
                                            <td><?= $produto->stock ?></td>
                                            <td><?= $produto->iva->percentagem ?> - <?= $produto->iva->descricao ?></td>
                                            <td>
                                                <a class="btn btn-dark" href="router.php?c=linhafatura&a=create&fatura_id=<?= $fatura->id ?>&produto_id=<?= $produto->id ?>"><i
                                                            class="fa fa-plus-circle" aria-hidden="true"> </i></a>
                                            </td>
                                            <?php }
                                            } ?>
                                        </tr>
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
    <script>
        $( "#clickme" ).click();
    </script>
</html>

<?php require_once './views/layouts/footer.php'; ?>