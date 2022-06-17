<?php

class ClienteController extends BaseAuthController
{
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function index()
    {
        $this->loginFilter($this->auth, ['cliente']);

        $this->renderView('cliente/index');
    }

    public function faturaCliente()
    {
        $this->loginFilter($this->auth, ['cliente']);

        $fatura = Fatura::all(array('conditions' => array('cliente_id  = ? AND estado != ?', $_SESSION["USER_ID"], 'em lancamento')));

        $this->renderView('fatura/index', ['faturas' => $fatura]);
    }

    public static function actionTotalFaturasEmitidas()
    {
        $faturas = Fatura::find('all', array('conditions' => array('estado = ? AND cliente_id = ?', 'emitida', $_SESSION["USER_ID"])));
        return count($faturas);

    }

    public static function actionTotalFaturasCanceladas()
    {
        $faturas = Fatura::find('all', array('conditions' => array('estado = ? AND cliente_id = ?', 'cancelada', $_SESSION["USER_ID"])));
        return count($faturas);

    }


}