<?php
require_once './views/layouts/headeradmin.php';
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="./public/css/registousers.css" rel="stylesheet">
</head>

<div class="user-create">
    <div class="main">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <h4>Adicionar Cliente</h4>
                    <p>Por favor preencha os seguintes campos</p>
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
                        </div>
                        <div class="button">
                            <button class="btn btn-dark" type="submit">Registar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

