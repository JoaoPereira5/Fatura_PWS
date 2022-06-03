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
        $users = User::all();
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
            $user->save();
            $this->redirectToRoute('user', 'index');
        } else {
            $this->renderView('user/edit', ['user' => $user]);
        }
    }


    public function delete($id)
    {
        $this->loginFilter($this->auth, ['administrador']);
        $user = User::find([$id]);
        $user->delete();
        $this->redirectToRoute('user', 'index');
    }
}