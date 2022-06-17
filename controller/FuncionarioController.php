<?php

class FuncionarioController extends BaseAuthController
{
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function index()
    {
        $this->loginFilter($this->auth, ['funcionario']);

        $this->renderView('funcionario/index');
    }

    public function listaClientes()
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        $user = User::all(array('conditions' => array('role != ? AND role != ?', 'funcionario', 'administrador')));

        $this->renderView('funcionario/listaclientes', ['users' => $user]);
    }

    public function create()
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        $this->renderView('funcionario/create');
    }

    public function store()
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        $user = new User($_POST);
        $user->role = 'cliente';
        $user->estado = 'ativo';
        if ($user->is_valid()) {
            $user->save();

            if(Auth::getUserLoggedRole() == 'administrador'){
                $this->redirectToRoute('user', 'index');
            } else{
                $this->redirectToRoute('funcionario', 'listaClientes');
            }
        } else {

            $this->renderView('funcionario/create', ['user' => $user]);
        }
    }

    public static function actionTotalClientesAtivos()
    {
        $users = User::find('all', array('conditions' => array('estado = ? AND role = ?', 'ativo', 'cliente')));
        return count($users);
    }

    public static function actionTotalClientesBanidos()
    {
        $users = User::find('all', array('conditions' => array('estado = ? AND role = ?', 'banido', 'cliente')));
        return count($users);
    }

    public static function actionTotalFaturasEmitidas()
    {
        $faturas = Fatura::find('all', array('conditions' => array('estado = ? AND user_id = ?', 'emitida', $_SESSION["USER_ID"])));
        return count($faturas);

    }

    public static function actionTotalFaturasCanceladas()
    {
        $faturas = Fatura::find('all', array('conditions' => array('estado = ? AND user_id = ?', 'cancelada', $_SESSION["USER_ID"])));
        return count($faturas);

    }








}