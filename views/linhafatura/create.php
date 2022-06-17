<?php
require_once './views/layouts/headerbackoffice.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fatura</title>
    </head>
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Fatura</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <img src="./public/img/empresalogo.png"  class=" img-circle elevation-3" style="max-width:90px; max-height:70px;">
                                            <small class="float-right mb-0">Data: <?= date("d-m-Y", strtotime($fatura->data)) ?> </small>
                                        </h4>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-7 invoice-col">
                                        Empresa:
                                        <address>
                                            <strong><?= $empresa->designacaosocial?></strong><br>
                                            <?= $empresa->morada. ' - '. $empresa->codigopostal ?><br>
                                            <?= $empresa->localidade?><br>
                                            Email: <?= $empresa->email?><br>
                                            Nif: <?= $empresa->nif?><br>
                                            Telefone: <?= $empresa->telefone?> <br>
                                            Capital Social: <?= $empresa->capitalsocial?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        Cliente:
                                        <address>
                                            <strong><?=$fatura->cliente->username ?></strong><br>
                                            <?=$fatura->cliente->morada. ' - '. $fatura->cliente->codigopostal?><br>
                                            <?=$fatura->cliente->localidade ?><br>
                                            Telemovel: <?=$fatura->cliente->telefone ?><br>
                                            Nif:<?=$fatura->cliente->nif ?><br>
                                            Email:<?=$fatura->cliente->email ?><br>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <b>Fatura #<?=$fatura->id ?></b><br>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Referência</th>
                                                <th>Descrição</th>
                                                <th>Quantidade</th>
                                                <th>Valor Unitário</th>
                                                <th>Valor Iva</th>
                                                <th>Total</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>



                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(!empty($linhasFatura)) {
                                                foreach ($linhasFatura as $linhaFatura) { ?>
                                            <tr>
                                                <td><?=$linhaFatura->produto->referencia ?></td>
                                                <td><?=$linhaFatura->produto->descricao ?></td>

                                                <td><?=$linhaFatura->quantidade ?></td>
                                                <td> <?= sprintf('%.2f', $linhaFatura->valorunitario) ?>€</td>
                                                <td><?=$linhaFatura->valoriva ?></td>
                                                <td><?= sprintf('%.2f',$linhaFatura->quantidade  * $linhaFatura->valorunitario ) ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                                <?php if($fatura->estado != 'emitida'){?>
                                                <td><a  class=" btn btn-warning" href="router.php?c=linhafatura&a=edit&linhafatura_id=<?=$linhaFatura->id ?>"><i class="fa fa-pen" aria-hidden="true"> Editar</i></a></td>
                                                <td><a  class=" btn btn-dark" href="router.php?c=linhafatura&a=delete&linhafatura_id=<?=$linhaFatura->id ?>"><i class="fa fa-trash" aria-hidden="true"> Eliminar</i></a></td>
                                                <?php } ?>
                                            </tr>
                                                <?php } }
                                                    if(!empty($produto)) {?>
                                                        <tr>
                                                            <form method="post" action="router.php?c=linhafatura&a=store&fatura_id=<?= $fatura->id?>&produto_id=<?=$produto->id?>">
                                                            <td><?=$produto->referencia?></td>
                                                            <td><?=$produto->descricao?></td>
                                                            <td><input onKeyDown="return false" id="quantidade" name="quantidade" type="number" value="1" min="1" max="<?= $produto->stock ?>"></td>
                                                            <input type="hidden"  name="valorunitario" value="<?= sprintf('%.2f', $produto->preco . '€')?>">
                                                            <td><?=sprintf('%.2f', $produto->preco . '€')?></td>
                                                            <input type="hidden"  name="valoriva" value="<?= sprintf('%.2f', $produto->preco * ($produto->iva->percentagem/100))?>">
                                                            <td><?=sprintf('%.2f', $produto->preco * ($produto->iva->percentagem/100))?></td>
                                                            <td></td>
                                                            <td></td>
                                                                <td colspan="12">
                                                                <button class="btn btn-success" type="submit"><i class="fa fa-check" aria-hidden="true"> Confirmar</i></button>
                                                            </td>
                                                            </form>
                                                        </tr>
                                                  <?php } else { ?>
                                                        <?php if($fatura->estado != 'emitida') { ?>
                                                        <tr>
                                                            <td colspan="12"><a  class=" btn btn-dark" href="router.php?c=linhafatura&a=selecionarprodutos&fatura_id=<?=$fatura->id ?>"><i class="fa fa-plus-circle" aria-hidden="true"> Selecionar Produto</i></a></td>
                                                        </tr>
                                                    <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-6">
                                    <?php if($fatura->estado == 'emitida') { ?>
                                        <img src="https://chart.googleapis.com/chart?chs=150x250&cht=qr&chl=<?="Fatura: ". $fatura->id . " Data: ". date("d-m-Y", strtotime($fatura->data)) . " Estado: " . $fatura->estado . " Total Iva: ". $fatura->ivatotal . " Total Fatura: " . $fatura->valortotal . " Cliente: " . $fatura->cliente->username . " Funcionário: " . $fatura->user->username ?>"  title="Fatura # <?=$fatura->id?>"/>
                                    <?php } ?>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                        <p class="lead">Total da Fatura:</p>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                <?php $subtotal = 0;
                                                if(!empty($linhasFatura)) {
                                                    foreach ($linhasFatura as $linhaFatura) {
                                                        $subtotal += ($linhaFatura->quantidade  * $linhaFatura->valorunitario);
                                                    }?>
                                                    <th style="width:50%">Subtotal: <?= sprintf('%.2f',$subtotal) ?>€</th>
                                                    <td></td>
                                                    <?php } else { ?>
                                                    <th style="width:50%">Subtotal: <?= sprintf('%.2f', $subtotal )?></th>
                                                    <td></td>
                                               <?php } ?>
                                                </tr>
                                                <tr>
                                                    <th>Total Iva: <?= sprintf('%.2f', $fatura->ivatotal )?></th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th>Total: <?= sprintf('%.2f', $fatura->valortotal)?>€</th>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-12">
                                        <a class="text-dark">Fatura Emitida por: <strong><?=$_SESSION["USER_USERNAME"] ?></strong></a> <br>
                                        <?php if($fatura->estado != 'emitida') { ?>
                                            <a  type="button" class=" btn btn-success float-right"  style="margin-right: 5px;" href="router.php?c=fatura&a=emitir&fatura_id=<?=$fatura->id ?>"><i class="fa fa-credit-card" aria-hidden="true"> Emitir Fatura</i></a></td>
                                            <a  type="button" class=" btn btn-danger float-right"  style="margin-right: 5px;" href="router.php?c=fatura&a=cancelar&fatura_id=<?=$fatura->id ?>"><i class="fa fa-ban" aria-hidden="true"> Cancelar Fatura</i></a></td>
                                       <?php } ?>
                                        <?php if($fatura->estado == 'emitida') { ?>
                                                    <a class="text-dark">Estado da Fatura: <strong><?=$fatura->estado?></strong> </a>

                                            <a  type="button" class=" btn btn-dark float-right"  style="margin-right: 5px;" href="router.php?c=fatura&a=index&fatura_id=<?=$fatura->id ?>"><i class="fa fa-exit" aria-hidden="true"> Ir para a Lista de Faturas</i></a></td>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                            <!-- /.invoice -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- ./wrapper -->
    </body>
    </html>
<?php
require_once './views/layouts/footer.php';
?>