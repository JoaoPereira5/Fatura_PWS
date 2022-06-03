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
                    <h4></h4>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label>Taxa Iva</label>
                                <input class="form-control" type="text" placeholder="<?= $iva->percentagem ?>%" readonly>

                                <label>Descrição</label>
                                <input class="form-control" type="text" placeholder="<?= $iva->descricao ?>" readonly>

                                <label>Estado do Iva</label>
                                <input class="form-control" type="text" placeholder="<?= $iva->vigor ?>" readonly>

                                <div class="button">
                                    <a  href="router.php?c=iva&a=index" class="btn btn-dark" type="submit">Voltar</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

</div>

