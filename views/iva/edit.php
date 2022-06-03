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
        <div class="col-6 offset-2">
            <div class="card">
                <div class="card-header">
                    <h4>Editar Taxa de Iva</h4>
                    <p>Por favor preencha os seguintes campos</p>
                </div>
                <div class="card-body">
                    <form method="post" action="router.php?c=iva&a=update&id=<?= $iva->id ?>" >
                        <div class="row">
                            <div class="col-12">
                                <label>Taxa Iva<span class="text-danger">*</span></label>
                                <input type="text" autocomplete="off"  name="percentagem" value="<?php if(isset($iva)) { echo
                                $iva->percentagem; }?>"  class="form-control" >
                                <?php if (isset($iva->errors)) {
                                    echo $iva->errors->on('percentagem');
                                } ?>
                                <label>Descrição<span class="text-danger">*</span></label>
                                <input type="text"  autocomplete="off"
                                       name="descricao" class="form-control"
                                       value="<?php if(isset($iva)) { echo
                                       $iva->descricao; }?>">
                                <?php if (isset($iva->errors)) {
                                    echo $iva->errors->on('descricao');
                                } ?>

                                <div class="button">
                                    <button class="btn btn-dark" type="submit">Atualizar</button>

                                    <a  href="router.php?c=iva&a=index" class="btn btn-dark" type="submit">Voltar</a>
                                </div>

                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
