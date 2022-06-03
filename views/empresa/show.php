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
                    <h4>Taxa de Iva</h4>
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
                        <div class="button">
                            <a href="router.php?c=empresa&a=index" class="btn btn-dark" type="submit">Voltar</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

