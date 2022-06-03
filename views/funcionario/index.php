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
        <div class="col-9 offset-2">
            <div class="card">
                <div class="card-header">
                    <p class="card-title">Lista de Clientes</p>
                </div>
                <?php if($users != null){ ?>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Nif</th>
                            <th scope="col">Role</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($users as $user){?>
                        <tr>
                            <th scope="row" ><?= $user->id ?></th>
                            <td><?= $user->username ?></td>
                            <td><?= $user->email ?></td>
                            <td><?= $user->telefone ?></td>
                            <td><?= $user->nif ?></td>
                            <td><?= $user->role ?></td>
                            <td><a href="router.php?c=user&a=show&id=<?=$user->id ?>"><i class="fa fa-eye" aria-hidden="true"> </i></a>
                            </td>
                            <td><a href="router.php?c=user&a=edit&id=<?=$user->id ?>"><i class="fa fa-pencil" aria-hidden="true"> </i></a>
                            </td>
                            <td><a href="router.php?c=user&a=delete&id=<?=$user->id ?>"><i class="fa fa-trash" aria-hidden="true"> </i></a>
                            </td>
                            <?php }?>
                        </tr>
                        <?php } else{ ?>
                        </tbody>
                    </table>
                    <div class="null">
                        <h5>Não existem utilizadores Clientes na aplicação</h5>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>