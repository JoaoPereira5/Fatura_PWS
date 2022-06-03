<?php
require_once './views/layouts/headeradmin.php';
?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="./public/css/index.css" rel="stylesheet">
</head>

<div class="main">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <p class="card-title">Empresa</p>
                </div>
                <?php if($empresas != null){ ?>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Designação Social</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Morada</th>
                            <th scope="col">Capital Social</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($empresas as $empresa){?>
                        <tr>
                            <th scope="row" ><?= $empresa->id ?></th>
                            <td><?= $empresa->designacaosocial ?></td>
                            <td><?= $empresa->telefone ?></td>
                            <td><?= $empresa->morada ?></td>
                            <td><?= $empresa->capitalsocial ?></td>
                            <td><a href="router.php?c=empresa&a=show&id=<?=$empresa->id ?>"><i class="fa fa-eye" aria-hidden="true"> </i></a>
                            </td>
                            <td><a href="router.php?c=empresa&a=edit&id=<?=$empresa->id ?>"><i class="fa fa-pencil" aria-hidden="true"> </i></a>
                            </td>
                            <?php }?>
                        </tr>
                        <?php } else{ ?>
                        </tbody>
                    </table>
                    <div class="null">
                        <h5>Não existe empresas registadas</h5>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>