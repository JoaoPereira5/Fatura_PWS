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
    <title>Editar Perfil</title>
</head><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Perfil</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link"  data-toggle="tab">Editar perfil: <?=$user->username?></a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class=" active tab-pane" id="settings">
                                        <form class="form-horizontal" method="post" action="router.php?c=user&a=profileUpdate&id=<?= $user->id ?>" >
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" autocomplete="off"
                                                       name="username" class="form-control" value="<?php if(isset($user)) { echo
                                                $user->username; }?>">
                                                <?php if (isset($user->errors)) {
                                                    echo "<p class='text-danger'>" . $user->errors->on('username') . "</p> <br>";
                                                } ?>                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" autocomplete="off"
                                                       name="email" class="form-control" value="<?php if(isset($user)) { echo
                                                $user->email; }?>">
                                                <?php if (isset($user->errors)) {
                                                    echo "<p class='text-danger'>" . $user->errors->on('email') . "</p> <br>";
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" autocomplete="off"
                                                       name="password" class="form-control" value="<?php if(isset($user)) { echo
                                                $user->password; }?>">
                                                <?php if (isset($user->errors)) {
                                                    echo "<p class='text-danger'>" . $user->errors->on('password') . "</p> <br>";
                                                } ?>                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Telefone</label>
                                            <div class="col-sm-10">
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
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Nif</label>
                                            <div class="col-sm-10">
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
                                            </div>
                                        </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Código Postal</label>
                                                <div class="col-sm-10">
                                                    <input type="text" autocomplete="off"
                                                           name="codigopostal" class="form-control" value="<?php if(isset($user)) { echo
                                                    $user->codigopostal; }?>">
                                                    <?php if (isset($user->errors)) {
                                                        echo "<p class='text-danger'>" . $user->errors->on('codigopostal') . "</p> <br>";
                                                    } ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Morada</label>
                                                <div class="col-sm-10">
                                                    <input type="text" autocomplete="off"
                                                           name="morada" class="form-control" value="<?php if(isset($user)) { echo
                                                    $user->morada; }?>">
                                                    <?php if (isset($user->errors)) {
                                                        echo "<p class='text-danger'>" . $user->errors->on('morada') . "</p> <br>";
                                                    } ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Localidade</label>
                                                <div class="col-sm-10">
                                                    <input type="text" autocomplete="off"
                                                           name="localidade"
                                                           class="form-control" value="<?php if(isset($user)) { echo
                                                    $user->localidade; }?>">
                                                    <?php if (isset($user->errors)) {
                                                        echo "<p class='text-danger'>" . $user->errors->on('localidade') . "</p> <br>";
                                                    } ?>
                                                </div>
                                            </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-dark">Atualizar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php
require_once './views/layouts/footer.php';
?>