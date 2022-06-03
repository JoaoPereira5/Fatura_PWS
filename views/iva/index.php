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
                    <p class="card-title">Lista das Taxas do Iva</p>
                    <a href="router.php?c=iva&a=create" class="btn btn-dark" type="submit">Criar Nova Taxa de Iva</a>

                </div>
                <?php if($ivas != null){ ?>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Percentagem</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Estado do Iva</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($ivas as $iva){?>
                            <tr>
                                <th scope="row" ><?= $iva->id ?></th>
                                <td><?= $iva->percentagem ?>%</td>
                                <td><?= $iva->descricao ?></td>
                                <td><?= $iva->vigor ?></td>
                                <td><a href="router.php?c=iva&a=show&id=<?=$iva->id ?>"><i class="fa fa-eye" aria-hidden="true"> </i></a>
                                </td>
                                <td><a href="router.php?c=iva&a=edit&id=<?=$iva->id ?>"><i class="fa fa-pencil" aria-hidden="true"> </i></a>
                                </td>
                                <?php
                                if($iva->vigor == 'sim'){ ?>

                                    <td><a href="router.php?c=iva&a=naovigor&id=<?=$iva->id ?>"><i class="fa fa-lock" aria-hidden="true"> </i></a>
                                    </td>
                                <?php }
                                else{ ?>
                                    <td><a href="router.php?c=iva&a=emvigor&id=<?=$iva->id ?>"><i class="fa fa-unlock-alt" aria-hidden="true"> </i></a>
                                    </td>
                                <?php }
                        }?>
                            </tr>
                        <?php } else{ ?>
                        </tbody>
                    </table>
                        <div class="null">
                            <h5>Não existem taxas de iva disponíveis</h5>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>