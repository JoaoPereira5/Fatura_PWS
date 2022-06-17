<?php

require_once './startup/boot.php';

/*  require Controladores */
require_once './controller/HomeController.php';
require_once './controller/AuthController.php';
require_once './controller/BaseAuthController.php';
require_once './controller/AdminController.php';
require_once './controller/EmpresaController.php';
require_once './controller/ClienteController.php';
require_once './controller/FuncionarioController.php';
require_once './controller/IvaController.php';
require_once './controller/ProdutoController.php';
require_once './controller/UserController.php';
require_once './controller/FaturaController.php';
require_once './controller/LinhaFaturaController.php';



$auth = new Auth();
if (!(isset($_GET['c']) && isset($_GET['a']))) {
    $homeController = new HomeController();
    $homeController->index();
} else {
    $controller = $_GET['c'];
    $action = $_GET['a'];

    switch ($controller) {
        case 'home':
            $homeController = new HomeController();
            switch ($action) {
                case 'index':
                    $homeController->index();
                    break;
            }
            break;

        case 'auth':
            $siteController = new AuthController($auth);
            switch ($action) {
                case 'getLogin':
                    $siteController->getLoginForm();
                    break;
                case 'doLogin':
                    $siteController->doLogin();
                    break;
                case 'logout':
                    $siteController->logout();
                    break;
            }
            break;

        case 'admin':
            $adminController = new AdminController($auth);
            switch ($action) {
                case 'index':
                    $adminController->index();
                    break;
            }
            break;
        case 'cliente':
            $clienteController = new ClienteController($auth);
            switch ($action) {
                case 'index':
                    $clienteController->index();
                    break;
                case 'faturaCliente':
                    $clienteController->faturaCliente();
                    break;
            }
            break;
        case 'empresa':
            $empresaController = new EmpresaController($auth);
            switch ($action) {
                case 'index':
                    $empresaController->index();
                    break;
                case 'show':
                    $id = $_GET[('id')];
                    $empresaController->show($id);
                    break;
                case 'edit':
                    $id = $_GET[('id')];
                    $empresaController->edit($id);
                    break;
                case 'update':
                    $id = $_GET[('id')];
                    $empresaController->update($id);
                    break;
            }
            break;
        case 'user':
            $userController = new UserController($auth);
            switch ($action) {
                case 'index':
                    $userController->index();
                    break;
                case 'show':
                    $id = $_GET[('id')];
                    $userController->show($id);
                    break;
                case 'create':
                    $userController->create();
                    break;
                case 'store':
                    $userController->store();
                    break;
                case 'profile':
                    $id = $_GET[('id')];
                    $userController->profile($id);
                    break;
                case 'profileUpdate':
                    $id = $_GET[('id')];
                    $userController->profileUpdate($id);
                    break;
                case 'edit':
                    $id = $_GET[('id')];
                    $userController->edit($id);
                    break;
                case 'update':
                    $id = $_GET[('id')];
                    $userController->update($id);
                    break;
                case 'ativarUser':
                    $id = $_GET[('id')];
                    $userController->ativarUser($id);
                    break;
                case 'banirUser':
                    $id = $_GET[('id')];
                    $userController->banirUser($id);
                    break;
            }
            break;
        case 'funcionario':
            $funcionarioController = new FuncionarioController($auth);
            switch ($action) {
                case 'index':
                    $funcionarioController->index();
                    break;
                case 'create':
                    $funcionarioController->create();
                    break;
                case 'store':
                    $funcionarioController->store();
                    break;
                case 'listaClientes':
                    $funcionarioController->listaClientes();
                    break;
            }
            break;
        case 'iva':
            $ivaController = new IvaController($auth);
            switch ($action) {
                case 'index':
                    $ivaController->index();
                    break;
                case 'create':
                    $ivaController->create();
                    break;
                case 'store':
                    $ivaController->store();
                    break;
                case 'show':
                    $id = $_GET[('id')];
                    $ivaController->show($id);
                    break;
                case 'edit':
                    $id = $_GET[('id')];
                    $ivaController->edit($id);
                    break;
                case 'update':
                    $id = $_GET[('id')];
                    $ivaController->update($id);
                    break;
                case 'emvigor':
                    $id = $_GET[('id')];
                    $ivaController->emVigor($id);
                    break;
                case 'naovigor':
                    $id = $_GET[('id')];
                    $ivaController->naoVigor($id);
                    break;
            }
            break;
        case 'produto':
            $produtoController = new ProdutoController($auth);
            switch ($action) {
                case 'index':
                    $produtoController->index();
                    break;
                case 'create':
                    $produtoController->create();
                    break;
                case 'store':
                    $produtoController->store();
                    break;
                case 'show':
                    $id = $_GET[('id')];
                    $produtoController->show($id);
                    break;
                case 'edit':
                    $id = $_GET[('id')];
                    $produtoController->edit($id);
                    break;
                case 'update':
                    $id = $_GET[('id')];
                    $produtoController->update($id);
                    break;
            }
            break;

        case 'fatura':
            $faturaController = new FaturaController($auth);
            switch ($action) {
                case 'index':
                    $faturaController->index();
                    break;
                case 'selecionarcliente':
                    $faturaController->selecionarcliente();
                    break;
                case 'create':
                    $faturaController->create();
                    break;
                case 'store':
                    $cliente_id = $_GET[('id')];
                    $faturaController->store($cliente_id);
                    break;
                case 'emitir':
                    $fatura_id = $_GET[('fatura_id')];
                    $faturaController->emitir($fatura_id);
                    break;
                case 'cancelar':
                    $fatura_id = $_GET[('fatura_id')];
                    $faturaController->cancelar($fatura_id);
                    break;
                case 'mostrarFatura':
                    $fatura_id = $_GET[('fatura_id')];
                    $faturaController->mostrarFatura($fatura_id);
                    break;
                case 'baixarPdf':
                    $fatura_id = $_GET[('fatura_id')];
                    $faturaController->baixarPdf($fatura_id);
                    break;
            }
            break;
        case 'linhafatura':
            $linhafaturaController = new LinhaFaturaController($auth);
            switch ($action) {
                case 'selecionarprodutos':
                    $fatura_id = $_GET[('fatura_id')];
                    $linhafaturaController->selecionarprodutos($fatura_id);
                    break;
                case 'create':
                    $fatura_id = $_GET[('fatura_id')];
                    if(isset($_GET[('produto_id')])){
                        $linhafaturaController->create($fatura_id, $_GET[('produto_id')]);
                    }else{
                        $linhafaturaController->create($fatura_id, null);
                    }
                    break;
                case 'store':
                    $fatura_id = $_GET[('fatura_id')];
                    $produto_id = $_GET[('produto_id')];
                    $linhafaturaController->store($fatura_id,$produto_id);
                    break;
                case 'edit':
                    $linhafatura_id = $_GET[('linhafatura_id')];
                    $linhafaturaController->edit($linhafatura_id);
                    break;
                case 'update':
                    $linhafatura_id = $_GET[('linhafatura_id')];
                    $linhafaturaController->update($linhafatura_id);
                    break;
                case 'delete':
                    $linhafatura_id = $_GET[('linhafatura_id')];
                    $linhafaturaController->delete($linhafatura_id);
                    break;
            }
            break;
    }
}

