<?php require_once './views/layouts/headerbackoffice.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mostrar Empresa</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <h1>Mostrar Empresa</h1>
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
                                <h3 class="card-title">Empresa: <b><?=$empresa->designacaosocial ?></b></h3>
                            </div>

                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Designação Social</label>
                                            <input type="text" name="username" class="form-control"
                                                   placeholder="<?php if (isset($empresa)) {
                                                       echo
                                                       $empresa->designacaosocial;
                                                   } ?>" readonly>

                                            <label>Telefone</label>
                                            <input type="text" name="telefone" class="form-control"
                                                   placeholder="<?php if (isset($empresa)) {
                                                       echo
                                                       $empresa->telefone;
                                                   } ?>" readonly>

                                            <label>NIF</label>
                                            <input type="text" name="nif" class="form-control" placeholder="<?php if (isset($empresa)) {
                                                echo
                                                $empresa->nif;
                                            } ?>" readonly>


                                            <label>Código Postal</label>
                                            <input type="text" name="codigopostal" class="form-control"
                                                   placeholder="<?php if (isset($empresa)) {
                                                       echo
                                                       $empresa->codigopostal;
                                                   } ?>" readonly>

                                        </div>
                                        <div class="col-6">

                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="<?php if (isset($empresa)) {
                                                echo
                                                $empresa->email;
                                            } ?>" readonly>

                                            <label>Morada</label>
                                            <input type="text" name="morada" class="form-control" placeholder="<?php if (isset($empresa)) {
                                                echo
                                                $empresa->morada;
                                            } ?>" readonly>

                                            <div class="top-margin">
                                                <label>Localidade</label>
                                                <input type="text" name="localidade" class="form-control"
                                                       placeholder="<?php if (isset($empresa)) {
                                                           echo
                                                           $empresa->localidade;
                                                       } ?>" readonly>
                                            </div>

                                            <label>Capital Social</label>
                                            <input type="text" name="capitalsocial" class="form-control" placeholder="<?php if (isset($empresa)) {
                                                echo
                                                $empresa->capitalsocial;
                                            } ?>" readonly>

                                        </div>
                                        <div class="col-12 mt-2 float-right">
                                            <a  href="router.php?c=empresa&a=index" class="btn btn-dark float-right" type="submit">Voltar</a>
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
