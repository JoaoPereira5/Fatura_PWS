<?php

class UserController extends BaseAuthController
{
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function index()
    {
        $this->loginFilter($this->auth, ['administrador']);
        $users = User::all(array('conditions' => array('role != ? ', 'administrador')));
        $this->renderView('user/index', ['users' => $users]);

    }

    public function create()
    {
        $this->loginFilter($this->auth, ['administrador']);

        $this->renderView('user/create');
    }

    public function store()
    {
        $this->loginFilter($this->auth, ['administrador']);
        $user = new User($_POST);
        $user->role = 'funcionario';
        $user->estado = 'ativo';
        if ($user->is_valid()) {
            $user->save();

            $this->redirectToRoute('user', 'index');
        } else {
            $this->renderView('user/create', ['user' => $user]);
        }
    }

    public function show($id)
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        $user = User::find([$id]);

        if (is_null($user)) {
            //TODO redirect to standard error page
        } else {
            $this->renderView('user/show', ['user' => $user]);
        }
    }


    public function edit($id)
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        $user = User::find([$id]);

        if (is_null($user)) {
            //TODO redirect to standard error page
        } else {
            $this->renderView('user/edit', ['user' => $user]);
        }
    }


    public function update($id)
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        $user = User::find([$id]);
        $user->update_attributes($_POST);
        if ($user->is_valid()) {
            //$user->password = md5($_POST["password"]);
            $user->save();
            $this->redirectToRoute('user', 'index');
        } else {
            $this->renderView('user/edit', ['user' => $user]);
        }
    }

    public function profile($id)
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario', 'cliente']);

        $user = User::find([$id]);

        $this->renderView('user/profile', ['user' => $user]);

    }

    public function profileUpdate($id)
    {
        $this->loginFilter($this->auth, ['cliente', 'administrador', 'funcionario']);
        $user = User::find([$id]);
        $user->update_attributes($_POST);
        if ($user->is_valid()) {
            //$user->password = md5($_POST['password']);
            $user->save();

            if(Auth::getUserLoggedRole() == 'cliente') {
                $this->redirectToRoute('cliente', 'index');
            } elseif (Auth::getUserLoggedRole() == 'funcionario'){
                $this->redirectToRoute('funcionario', 'index');
            }else{
                $this->redirectToRoute('admin', 'index');
            }

        } else {
            $this->renderView('user/profile', ['user' => $user]);
        }
    }



    public function ativarUser($id)
    {
        $this->loginFilter($this->auth, ['administrador']);
        $user = User::find([$id]);
        $user->estado = 'ativo';
        $user->save();
        //$iva->update_attributes(['vigor' => 'nao']);
        $this->redirectToRoute('user', 'index');
    }

    public function banirUser($id)
    {
        $this->loginFilter($this->auth, ['administrador']);
        $user = User::find([$id]);
        $user->estado = 'banido';
        $user->save();
        $this->redirectToRoute('user', 'index');
    }
}