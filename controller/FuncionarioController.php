<?php

class FuncionarioController extends BaseAuthController
{
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }


    public function index()
    {
        $this->loginFilter($this->auth, ['funcionario', 'administrador']);

        $user = User::all(array('conditions' => array('role != ? AND role != ?', 'funcionario', 'administrador')));

        $this->renderView('funcionario/index', ['users' => $user]);
    }

    public function create()
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        $this->renderView('funcionario/create');
    }

    public function store()
    {
        $this->loginFilter($this->auth, ['funcionario', 'administrador']);

        $user = new User($_POST);
        $user->role = 'cliente';

        if ($user->is_valid()) {
            $user->save();

            $this->redirectToRoute('funcionario', 'index');
        } else {

            $this->renderView('funcionario/create', ['user' => $user]);
        }
    }

}