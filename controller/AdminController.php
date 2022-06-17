<?php

class AdminController extends BaseAuthController
{
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function index()
    {
        $this->loginFilter($this->auth, ['administrador']);

        $this->renderView('admin/index');
    }

    public static function actionTotalUsersAtivos()
    {
        $users = User::find('all', array('conditions' => array('estado = ?', 'ativo')));
        return count($users);
    }

    public static function actionTotalUsersBanidos()
    {
        $users = User::find('all', array('conditions' => array('estado = ?', 'banido')));
        return count($users);
    }

    public static function actionTotalFaturasEmitidas()
    {
        $faturas = Fatura::find('all', array('conditions' => array('estado = ?', 'emitida')));
        return count($faturas);

    }

    public static function actionTotalFaturasCanceladas()
    {
        $faturas = Fatura::find('all', array('conditions' => array('estado = ?', 'cancelada')));
        return count($faturas);

    }

    public static function actionTotalTaxasIvaVigor()
    {
        $ivas = Iva::find('all', array('conditions' => array('vigor = ?', 'sim')));
        return count($ivas);

    }

    public static function actionTotalTaxasIvaDesatualizadas()
    {
        $ivas = Iva::find('all', array('conditions' => array('vigor = ?', 'nao')));
        return count($ivas);

    }

    public static function actionTotalProdutos()
    {
        $produtos = Produto::find('all', array('conditions' => array('stock > ?', 0)));
        return count($produtos);

    }

    public static function actionEmpresa()
    {
        $empresa = Empresa::find([1])->count();

        return $empresa;

    }




}
