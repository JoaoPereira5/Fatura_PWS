<?php

class ProdutoController extends BaseAuthController
{

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }


    public function index()
    {
        $this->loginFilter($this->auth, ['funcionario', 'administrador']);

        $produtos= Produto::all();

        $this->renderView('produto/index', ['produtos' => $produtos]);
    }



    public function create()
    {
        $this->loginFilter($this->auth, ['funcionario','administrador']);
        $iva = Iva::find('all', array('conditions' => array('vigor = ?', 'sim')));

        $this->renderView('produto/create', ['ivas' => $iva]);
    }


    public function store()
    {
        $this->loginFilter($this->auth, ['funcionario', 'administrador']);

        $iva = Iva::find('all', array('conditions' => array('vigor = ?', 'sim')));
        $produto = new Produto($_POST);
        if ($produto->is_valid()) {
            $produto->save();

            $this->redirectToRoute('produto', 'index');
        } else {
            $this->renderView('produto/create', ['produto' => $produto, 'ivas' => $iva]);
        }
    }



    public function show($id)
    {
        $this->loginFilter($this->auth, ['funcionario','administrador']);

        $produto = Produto::find([$id]);

        if (is_null($produto)) {
            //TODO redirect to standard error page
        } else {
            $this->renderView('produto/show', ['produto' => $produto]);
        }
    }



    public function edit($id)
    {
        $this->loginFilter($this->auth, ['funcionario', 'administrador']);
        $iva = Iva::find('all', array('conditions' => array('vigor = ?', 'sim')));

        $produto = Produto::find([$id]);

        if (is_null($produto)) {
            //TODO redirect to standard error page
        } else {
            $this->renderView('produto/edit', ['produto' => $produto, 'ivas'=>$iva]);
        }
    }



    public function update($id)
    {
        $this->loginFilter($this->auth, ['funcionario', 'administrador']);

        $produto = Produto::find([$id]);
        $produto->update_attributes($_POST);
        $iva = Iva::find('all', array('conditions' => array('vigor = ?', 'sim')));
        if ($produto->is_valid()) {
            $produto->save();
            $this->redirectToRoute('produto', 'index');
        } else {
            //redirect to form with data and errors
            $this->renderView('produto/edit', ['produto' => $produto , 'ivas' => $iva]);
        }
    }


}