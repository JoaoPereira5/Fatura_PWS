<?php require_once './views/layouts/headerbackoffice.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Iva</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <h1>Editar Iva</h1>
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
                                <h3 class="card-title">Iva: <b><?=$iva->percentagem . '-'. $iva->descricao?></b></h3>
                            </div>

                            <div class="card-body">
                                <form method="post" action="router.php?c=iva&a=update&id=<?= $iva->id ?>">
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

                                        </div>

                                        <div class="col-12 mt-2 float-right">
                                            <a  class="btn btn-dark" href="router.php?c=iva&a=index" class="btn btn-dark float-right" type="submit">Voltar</a>
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
