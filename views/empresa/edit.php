<?php require_once './views/layouts/headerbackoffice.php'; ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Editar Empresa</title>
    </head>
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-4">
                            <h1>Editar Empresa</h1>
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
                                    <form method="post" action="router.php?c=empresa&a=update&id=<?= $empresa->id ?>" >
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Designação Social<span class="text-danger">*</span></label>
                                                <input type="text" autocomplete="off"
                                                       name="designacaosocial" class="form-control" value="<?php if(isset($empresa)) { echo
                                                $empresa->designacaosocial; }?>" >
                                                <?php if (isset($empresa->errors)) {
                                                    echo $empresa->errors->on('designacaosocial');
                                                } ?>
                                                <label>Telefone<span class="text-danger">*</span></label>
                                                <input type="text" autocomplete="off"
                                                       name="telefone" class="form-control" value="<?php if(isset($empresa)) { echo
                                                $empresa->telefone; }?>">
                                                <?php if(isset($empresa->errors)) {
                                                    if (is_array($empresa->errors->on('telefone'))) {
                                                        foreach ($empresa->errors->on('telefone') as $error) {
                                                            echo $error;
                                                        }
                                                    } else {
                                                        echo $empresa->errors->on('telefone');
                                                    }
                                                }?>

                                                <label>NIF<span class="text-danger">*</span></label>
                                                <input type="text" autocomplete="off"
                                                       name="nif" class="form-control" value="<?php if(isset($empresa)) { echo
                                                $empresa->nif; }?>" >
                                                <?php if(isset($empresa->errors)) {
                                                    if (is_array($empresa->errors->on('nif'))) {
                                                        foreach ($empresa->errors->on('nif') as $error) {
                                                            echo $error;
                                                        }
                                                    } else {
                                                        echo $empresa->errors->on('nif');
                                                    }
                                                }?>

                                                <label>Código Postal<span class="text-danger">*</span></label>
                                                <input type="text" autocomplete="off"
                                                       name="codigopostal" class="form-control" value="<?php if(isset($empresa)) { echo
                                                $empresa->codigopostal; }?>">
                                                <?php if (isset($empresa->errors)) {
                                                    echo $empresa->errors->on('codigopsotal');
                                                } ?>
                                            </div>
                                            <div class="col-6">
                                                <label>Email<span class="text-danger">*</span></label>
                                                <input type="email" autocomplete="off"
                                                       name="email" class="form-control" value="<?php if(isset($empresa)) { echo
                                                $empresa->email; }?>">
                                                <?php if (isset($empresa->errors)) {
                                                    echo $empresa->errors->on('email');
                                                } ?>
                                                <label>Morada<span class="text-danger">*</span></label>
                                                <input type="text" autocomplete="off"
                                                       name="morada" class="form-control" value="<?php if(isset($empresa)) { echo
                                                $empresa->morada; }?>">
                                                <?php if (isset($empresa->errors)) {
                                                    echo $empresa->errors->on('morada');
                                                } ?>

                                                <div class="top-margin">
                                                    <label>Localidade<span class="text-danger">*</span></label>
                                                    <input type="text" autocomplete="off"
                                                           name="localidade"
                                                           class="form-control" value="<?php if(isset($empresa)) { echo
                                                    $empresa->localidade; }?>">
                                                    <?php if (isset($empresa->errors)) {
                                                        echo $empresa->errors->on('localidade');
                                                    } ?>
                                                </div>

                                                <label>Capital Social<span class="text-danger">*</span></label>
                                                <input type="text" autocomplete="off"
                                                       name="capitalsocial" class="form-control" value="<?php if(isset($empresa)) { echo
                                                $empresa->capitalsocial; }?>">
                                                <?php if (isset($empresa->errors)) {
                                                    echo $empresa->errors->on('capitalsocial');
                                                } ?>

                                            </div>
                                            <div class="col-12 mt-2 float-right">
                                                <a  href="router.php?c=empresa&a=index" class="btn btn-dark float-right" type="submit">Voltar</a>
                                                <button class="btn btn-dark float-right mr-2" type="submit">Atualizar</button>
                                            </div>
                                        </div>
                                    </form>
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
