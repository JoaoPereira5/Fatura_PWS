<?php require_once './views/layouts/headerbackoffice.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Produto</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <h1>Editar Produto</h1>
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
                                <h3 class="card-title">Produto: <b><?=$produto->referencia?></b></h3>
                            </div>

                            <div class="card-body">
                                <form method="post" action="router.php?c=produto&a=update&id=<?= $produto->id ?>" >
                                    <div class="row">
                                        <div class="col-12">
                                            <label>Referência<span class="text-danger">*</span></label>
                                            <input type="text" autocomplete="off"  name="referencia" value="<?php if(isset($produto)) { echo
                                            $produto->referencia; }?>"  class="form-control">
                                            <?php if (isset($produto->errors)) {
                                                echo $produto->errors->on('referencia');
                                            } ?>
                                            <label>Descrição<span class="text-danger">*</span></label>
                                            <input type="text"  autocomplete="off"
                                                   name="descricao" value="<?php if(isset($produto)) { echo
                                            $produto->descricao; }?>" class="form-control">
                                            <?php if (isset($produto->errors)) {
                                                echo $produto->errors->on('descricao');
                                            } ?>

                                            <label>Preço<span class="text-danger">*</span></label>
                                            <input type="text"  autocomplete="off"
                                                   name="preco" value="<?php if(isset($produto)) { echo
                                            $produto->preco; }?>" class="form-control">
                                            <?php if (isset($produto->errors)) {
                                                echo $produto->errors->on('preco');
                                            } ?>

                                            <label>Quantidade<span class="text-danger">*</span></label>
                                            <input type="number" autocomplete="off"  name="stock" value="<?php if(isset($produto)) { echo
                                            $produto->stock; }?>"  class="form-control">
                                            <?php if (isset($produto->errors)) {
                                                echo $produto->errors->on('stock');
                                            } ?>

                                            <div class="form-group">
                                                <label for="exampleSelectBorder">Taxa Iva<code class="text-danger">*</code></label>
                                                <select name="iva_id" class="custom-select form-control-border" id="exampleSelectBorder">
                                                    <?php
                                                    foreach ($ivas as $iva) {
                                                        if (isset($produto) && $produto->iva_id == $iva->id) { ?>
                                                            <option selected
                                                                    value="<?= $iva->id; ?>"><?= $iva->percentagem . '%' . '-' . $iva->descricao ?></option>
                                                        <?php } else {
                                                            ?>
                                                            <option value="<?= $iva->id; ?>"><?= $iva->percentagem . '%' . '-' . $iva->descricao ?></option>

                                                        <?php }
                                                    } ?>
                                                </select>
                                                <?php if (isset($produto->errors)) {
                                                    echo $produto->errors->on('iva_id');
                                                } ?>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-2 float-right">
                                            <a  href="router.php?c=produto&a=index" class="btn btn-dark float-right" type="submit">Voltar</a>
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
