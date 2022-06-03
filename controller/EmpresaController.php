<?php

class EmpresaController extends BaseAuthController
{
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }


    public function index()
    {
        $this->loginFilter($this->auth, ['funcionario', 'administrador']);

        $empresas = Empresa::all();

        $this->renderView('empresa/index', ['empresas' => $empresas]);
    }

    public function show($id)
    {
        $this->loginFilter($this->auth, ['funcionario', 'administrador']);

        $empresa = Empresa::find([$id]);

        if (is_null($empresa)) {

        } else {
            $this->renderView('empresa/show', ['empresa' => $empresa]);
        }
    }


    public function edit($id)
    {
        $this->loginFilter($this->auth, ['funcionario', 'administrador']);

        $empresa = Empresa::find([$id]);

        if (is_null($empresa)) {

        } else {
            $this->renderView('empresa/edit', ['empresa' => $empresa]);
        }
    }


    public function update($id)
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        $empresa = Empresa::find([$id]);
        $empresa->update_attributes($_POST);

        if ($empresa->is_valid()) {
            $empresa->save();
            $this->redirectToRoute('empresa', 'index');
        } else {
            $this->renderView('empresa/edit', ['empresa' => $empresa]);
        }
    }

}