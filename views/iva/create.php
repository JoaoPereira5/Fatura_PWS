<?php require_once './views/layouts/headerbackoffice.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Criar Taxa de Iva</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <h1>Criar Nova Taxa de Iva</h1>
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
                                <h3 class="card-title">Criar Taxa de Iva</b></h3>
                            </div>

                            <div class="card-body">
                                <form method="post" action="<?= "router.php?c=iva&a=store" ?>">
                                    <div class="row">
                                        <div class="col-12">
                                            <label>Taxa Iva<span class="text-danger">*</span></label>
                                            <input type="text"  name="percentagem" value="<?php if(isset($iva)) { echo
                                            $iva->percentagem; }?>"  class="form-control" placeholder="Introduza a percentagem do Iva">
                                            <?php if (isset($iva->errors)) {
                                                echo $iva->errors->on('percentagem');
                                            } ?>
                                            <label>Descrição<span class="text-danger">*</span></label>
                                            <input type="text"  autocomplete="off"
                                                   name="descricao" value="<?php if(isset($iva)) { echo
                                            $iva->descricao; }?>" class="form-control"
                                                   placeholder="Introduza uma descrição">
                                            <?php if (isset($iva->errors)) {
                                                echo $iva->errors->on('descricao');
                                            } ?>
                                            <div class="form-group">
                                                <label for="exampleSelectBorder">Estado do Iva <code class="text-danger">*</code></label>
                                                <select name="vigor" class="custom-select form-control-border" id="exampleSelectBorder">
                                                    <option selected> Selecione o estado do Iva </option>
                                                    <?php  foreach($estados as $key => $value) {
                                                        if (isset($iva) && $iva->vigor == $key) { ?>
                                                            <option selected
                                                                    value="<?= $key; ?>"><?= $value ?></option>
                                                        <?php } else { ?>
                                                            <option value="<?= $key ?>"><?= $value ?></option>
                                                        <?php } } ?>
                                                </select>
                                                <?php if (isset($iva->errors)) {
                                                    echo $iva->errors->on('vigor');
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2 float-right">
                                            <button class="btn btn-dark float-right mr-2" type="submit">Registar</button>
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

