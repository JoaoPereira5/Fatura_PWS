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
                    <h4>Editar Funcionário </h4>
                    <p>Por favor preencha os seguintes campos</p>
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
                            <div class="button">
                                <button class="btn btn-dark" type="submit">Atualizar</button>
                                <a  href="router.php?c=empresa&a=index" class="btn btn-dark" type="submit">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

