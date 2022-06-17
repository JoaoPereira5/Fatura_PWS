<?php require_once './views/layouts/headerbackoffice.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Utilizador</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <h1>Editar Utilizador</h1>
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
                                <h3 class="card-title">Utilizador: <b><?=$user->username?></b></h3>
                            </div>

                            <div class="card-body">
                                <form method="post" action="router.php?c=user&a=update&id=<?= $user->id ?>" >
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Username<span class="text-danger">*</span></label>
                                            <input type="text" autocomplete="off"
                                                   name="username" class="form-control" value="<?php if(isset($user)) { echo
                                            $user->username; }?>" readonly>
                                            <?php if (isset($user->errors)) {
                                                echo "<p class='text-danger'>" . $user->errors->on('username') . "</p> <br>";
                                            } ?>
                                            <label>Telefone<span class="text-danger">*</span></label>
                                            <input type="text" autocomplete="off"
                                                   name="telefone" class="form-control" value="<?php if(isset($user)) { echo
                                            $user->telefone; }?>">
                                            <?php if(isset($user->errors)) {
                                                if (is_array($user->errors->on('telefone'))) {
                                                    foreach ($user->errors->on('telefone') as $error) {
                                                        echo "<p class='text-danger'>" . $error . "</p> <br>";
                                                    }
                                                } else {
                                                    echo "<p class='text-danger'>" . $user->errors->on('telefone') . "</p> <br>";
                                                }
                                            }?>
                                            <label>NIF<span class="text-danger">*</span></label>
                                            <input type="text" autocomplete="off"
                                                   name="nif" class="form-control" value="<?php if(isset($user)) { echo
                                            $user->nif; }?>" >
                                            <?php if(isset($user->errors)) {
                                                if (is_array($user->errors->on('nif'))) {
                                                    foreach ($user->errors->on('nif') as $error) {
                                                        echo "<p class='text-danger'>" . $error . "</p> <br>";
                                                    }
                                                } else {
                                                    echo "<p class='text-danger'>" . $user->errors->on('nif') . "</p> <br>";
                                                }
                                            }?>
                                            <label>Código Postal<span class="text-danger">*</span></label>
                                            <input type="text" autocomplete="off"
                                                   name="codigopostal" class="form-control" value="<?php if(isset($user)) { echo
                                            $user->codigopostal; }?>">
                                            <?php if (isset($user->errors)) {
                                                echo "<p class='text-danger'>" . $user->errors->on('codigopostal') . "</p> <br>";
                                            } ?>
                                        </div>
                                        <div class="col-6">
                                            <label>Password<span class="text-danger">*</span></label>
                                            <input type="password" autocomplete="off"
                                                   name="password" class="form-control" value="<?php if(isset($user)) { echo
                                            $user->password; }?>" readonly>
                                            <?php if (isset($user->errors)) {
                                                echo "<p class='text-danger'>" . $user->errors->on('password') . "</p> <br>";
                                            } ?>

                                            <label>Email<span class="text-danger">*</span></label>
                                            <input type="email" autocomplete="off"
                                                   name="email" class="form-control" value="<?php if(isset($user)) { echo
                                            $user->email; }?>">
                                            <?php if (isset($user->errors)) {
                                                echo "<p class='text-danger'>" . $user->errors->on('email') . "</p> <br>";
                                            } ?>

                                            <label>Morada<span class="text-danger">*</span></label>
                                            <input type="text" autocomplete="off"
                                                   name="morada" class="form-control" value="<?php if(isset($user)) { echo
                                            $user->morada; }?>">
                                            <?php if (isset($user->errors)) {
                                                echo "<p class='text-danger'>" . $user->errors->on('morada') . "</p> <br>";
                                            } ?>

                                            <div class="top-margin">
                                                <label>Localidade<span class="text-danger">*</span></label>
                                                <input type="text" autocomplete="off"
                                                       name="localidade"
                                                       class="form-control" value="<?php if(isset($user)) { echo
                                                $user->localidade; }?>">
                                                <?php if (isset($user->errors)) {
                                                    echo "<p class='text-danger'>" . $user->errors->on('localidade') . "</p> <br>";
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2 float-right">
                                            <?php if(Auth::getUserLoggedRole() == 'funcionario'){ ?>

                                                <a  href="router.php?c=funcionario&a=index" class="btn btn-dark float-right" type="submit">Voltar</a>

                                            <?php } else { ?>

                                                <a  href="router.php?c=user&a=index" class="btn btn-dark float-right" type="submit">Voltar</a>

                                            <?php }?>
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
