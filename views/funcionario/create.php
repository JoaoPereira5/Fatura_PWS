<?php require_once './views/layouts/headerbackoffice.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registar Cliente</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <h1>Registar Cliente</h1>
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
                                <h3 class="card-title">Registar Cliente</b></h3>
                            </div>

                            <div class="card-body">
                                <form method="post" action="<?= "router.php?c=funcionario&a=store" ?>">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Username<span class="text-danger">*</span></label>
                                            <input type="text" autocomplete="off"
                                                   name="username" class="form-control" value="<?php if(isset($user)) { echo
                                            $user->username; }?>" placeholder="Introduza o seu username">
                                            <?php if (isset($user->errors)) {
                                                echo $user->errors->on('username');
                                            } ?>
                                            <label>Telefone<span class="text-danger">*</span></label>
                                            <input type="text" autocomplete="off"
                                                   name="telefone" class="form-control" value="<?php if(isset($user)) { echo
                                            $user->telefone; }?>"
                                                   placeholder="Introduza o seu numero de telefone">
                                            <?php if(isset($user->errors)) {
                                                if (is_array($user->errors->on('telefone'))) {
                                                    foreach ($user->errors->on('telefone') as $error) {
                                                        echo $error;
                                                    }
                                                } else {
                                                    echo $user->errors->on('telefone');
                                                }
                                            }?>


                                            <label>NIF<span class="text-danger">*</span></label>
                                            <input type="text" autocomplete="off"
                                                   name="nif" class="form-control" value="<?php if(isset($user)) { echo
                                            $user->nif; }?>" placeholder="Introduza o seu nif">
                                            <?php if(isset($user->errors)) {
                                                if (is_array($user->errors->on('nif'))) {
                                                    foreach ($user->errors->on('nif') as $error) {
                                                        echo $error;
                                                    }
                                                } else {
                                                    echo $user->errors->on('nif');
                                                }
                                            }?>

                                            <label>Código Postal<span class="text-danger">*</span></label>
                                            <input type="text" autocomplete="off"
                                                   name="codigopostal" class="form-control" value="<?php if(isset($user)) { echo
                                            $user->codigopostal; }?>" placeholder="Introduza o seu username">
                                            <?php if (isset($user->errors)) {
                                                echo $user->errors->on('codigopsotal');
                                            } ?>

                                        </div>
                                        <div class="col-6">
                                            <label>Password<span class="text-danger">*</span></label>
                                            <input type="password" autocomplete="off"
                                                   name="password" class="form-control" value="<?php if(isset($user)) { echo
                                            $user->password; }?>" placeholder="Introduza a sua password">
                                            <?php if (isset($user->errors)) {
                                                echo $user->errors->on('password');
                                            } ?>

                                            <label>Email<span class="text-danger">*</span></label>
                                            <input type="email" autocomplete="off"
                                                   name="email" class="form-control" value="<?php if(isset($user)) { echo
                                            $user->email; }?>" placeholder="Introduza o seu email">
                                            <?php if (isset($user->errors)) {
                                                echo $user->errors->on('email');
                                            } ?>

                                            <label>Morada<span class="text-danger">*</span></label>
                                            <input type="text" autocomplete="off"
                                                   name="morada" class="form-control" value="<?php if(isset($user)) { echo
                                            $user->morada; }?>" placeholder="Introduza o sua Morada">
                                            <?php if (isset($user->errors)) {
                                                echo $user->errors->on('morada');
                                            } ?>

                                            <div class="top-margin">
                                                <label>Localidade<span class="text-danger">*</span></label>
                                                <input type="text" autocomplete="off"
                                                       name="localidade"
                                                       class="form-control" value="<?php if(isset($user)) { echo
                                                $user->localidade; }?>" placeholder="Introduza o sua Localidade">
                                                <?php if (isset($user->errors)) {
                                                    echo $user->errors->on('localidade');
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2 float-right">
                                            <button class="btn btn-dark float-right mr-2" type="submit">Registar</button>
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

