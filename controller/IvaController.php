<?php

class IvaController extends BaseAuthController
{

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }


    public function index()
    {
        $this->loginFilter($this->auth, ['funcionario', 'administrador']);

        $ivas = Iva::all();

        $this->renderView('iva/index', ['ivas' => $ivas]);
    }



    public function create()
    {
        $this->loginFilter($this->auth, ['funcionario','administrador']);

        $this->renderView('iva/create');
    }


    public function store()
    {
        $this->loginFilter($this->auth, ['funcionario', 'administrador']);
        $iva = new Iva($_POST);
        if ($iva->is_valid()) {
            $iva->save();

            $this->redirectToRoute('iva', 'index');
        } else {
            $this->renderView('iva/create', ['iva' => $iva]);
        }
    }



    public function show($id)
    {
        $this->loginFilter($this->auth, ['funcionario','administrador']);

        $iva = Iva::find([$id]);

        if (is_null($iva)) {
            //TODO redirect to standard error page
        } else {
            $this->renderView('iva/show', ['iva' => $iva]);
        }
    }



    public function edit($id)
    {
        $this->loginFilter($this->auth, ['funcionario', 'administrador']);

        $iva = Iva::find([$id]);

        if (is_null($iva)) {
            //TODO redirect to standard error page
        } else {
            $this->renderView('iva/edit', ['iva' => $iva]);
        }
    }



    public function update($id)
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        $iva = Iva::find([$id]);
        $iva->update_attributes($_POST);

        if ($iva->is_valid()) {
            $iva->save();
            $this->redirectToRoute('iva', 'index');
        } else {
            //redirect to form with data and errors
            $this->renderView('iva/edit', ['iva' => $iva]);
        }
    }


    public function naoVigor($id)
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        $iva = Iva::find([$id]);
        $iva->update_attributes(['vigor' => 'nao']);

        $this->redirectToRoute('iva', 'index');
    }

    public function emVigor($id)
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        $iva = Iva::find([$id]);
        $iva->update_attributes(['vigor' => 'sim']);

        $this->redirectToRoute('iva', 'index');
    }


}