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
                                            <small class="float-right">Data: <?= date("d-m-Y", strtotime($fatura->data)) ?> </small>
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
                                                <th>Refer??ncia</th>
                                                <th>Descri????o</th>
                                                <th>Quantidade</th>
                                                <th>Valor Unit??rio</th>
                                                <th>Valor Iva</th>
                                                <th>Total</th>
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
                                                        <td> <?= sprintf('%.2f', $linhaFatura->valorunitario) ?>???</td>
                                                        <td><?=$linhaFatura->valoriva ?></td>
                                                        <td><?= sprintf('%.2f',$linhaFatura->quantidade  * $linhaFatura->valorunitario ) ?></td>
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
                                        <img src="https://chart.googleapis.com/chart?chs=150x250&cht=qr&chl=<?="Fatura: ". $fatura->id . " Data: ". date("d-m-Y", strtotime($fatura->data)) . " Estado: " . $fatura->estado . " Total Iva: ". $fatura->ivatotal . " Total Fatura: " . $fatura->valortotal . " Cliente: " . $fatura->cliente->username . " Funcion??rio: " . $fatura->user->username ?>"  title="Fatura # <?=$fatura->id?>"/>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                        <p class="lead">Total da Fatura:</p>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th style="width:50%">Subtotal: <?= sprintf('%.2f', $fatura->valortotal)?>???</th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Iva: <?= sprintf('%.2f', $fatura->ivatotal )?></th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th>Total: <?= sprintf('%.2f', $fatura->valortotal + $fatura->ivatotal)?>???</th>
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
                                        <a class="text-dark">Fatura Emitida por: <strong><?=$fatura->user->username?></strong></a>

                                        <a class="text-dark float-right">Estado da Fatura: <strong><?=$fatura->estado?></strong></a>
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