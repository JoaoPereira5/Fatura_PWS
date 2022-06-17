<?php

use Carbon\Carbon;
use Dompdf\Dompdf;

class FaturaController extends BaseAuthController
{
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function index()
    {
        $this->loginFilter($this->auth, ['funcionario', 'administrador']);

        if(Auth::getUserLoggedRole() == 'funcionario'){
            $fatura = Fatura::all(array('conditions' => array('user_id = ? AND estado != ?', $_SESSION["USER_ID"], 'em lancamento')));
        } else {
            $fatura = Fatura::all(array('conditions' => array('estado != ?',  'em lancamento')));
        }

        $this->renderView('fatura/index', ['faturas' => $fatura]);

    }

    public function mostrarFatura($fatura_id)
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario', 'cliente']);

        $fatura = Fatura::find(array('conditions' => array('id = ?', $fatura_id)));
        $linhasFatura = Linhafatura::all(array('conditions' => array('fatura_id = ?', $fatura_id)));
        $empresa = Empresa::find([1]);

        $this->renderView('fatura/mostrarfatura', ['empresa' => $empresa, 'fatura' => $fatura, 'linhasFatura' => $linhasFatura]);


    }

    public function baixarPdf($fatura_id)
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario', 'cliente']);
        $fatura = Fatura::find(array('conditions' => array('id = ?', $fatura_id)));
        $empresa = Empresa::find([1]);

        $pdf = new Dompdf();

        $pdf->loadHtml('<h1>Fatura nº' . $fatura->id . ' </h1>
        <p>_______________________________________________________________________________________</p>
        <br>
        <h3> Empresa: ' . $empresa->designacaosocial . ' </h3>
        <h3> Cliente: ' . $fatura->cliente->username . ' </h3>
        <h3> Funcionario: ' . $fatura->user->username . ' </h3>

        <p>Data Fatura: ' . date("d-m-Y", strtotime($fatura->data)) . ' </p>
        <p>Iva Total: ' . sprintf('%.2f',$fatura->ivatotal) . '</p>
        <p>Total Fatura: ' . sprintf('%.2f',$fatura->valortotal). ' € </p>
        <p class="tagline">Estado da Fatura: ' . $fatura->estado . '  </p>

        <br>
        <br>
        <p>Nota: A fatura em pdf não está completa pedimos desculpa pelo sucedido!</p>
        <br>
        <p>_______________________________________________________________________________________</p>');


        $pdf->render();

        $pdf->stream(
            'Fatura_#_'.$fatura->id.'',
            array("Attachement" => true)
        );
    }

    public function selecionarcliente()
    {
        $this->loginFilter($this->auth, ['funcionario', 'administrador']);

        if (isset($_POST[('btn_search')])) {
            $search = $_POST['table_search'];
            $clientes = User::find('all', array('conditions' => "username LIKE  '%$search%'"));
            $pesquisaresultado= [];
            foreach ($clientes as $cliente){
                if($cliente->role == 'cliente' && $cliente->estado == 'ativo'){
                    array_push($pesquisaresultado , $cliente);
                }
            }
            $clientes = $pesquisaresultado;
            $this->renderView('fatura/clientes', ['clientes' => $clientes]);

        } else{
            $user = User::all(array('conditions' => array('role != ? AND role != ? AND estado = ?', 'funcionario', 'administrador', 'ativo')));

            $this->renderView('fatura/clientes', ['clientes' => $user]);
        }


    }

    public function create()
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        $empresa = Empresa::find([1]);
        $this->renderView('fatura/create', ['empresa' => $empresa]);
    }

    public function store($cliente_id)
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        $fatura = Fatura::find('one', array('conditions' => array('user_id = ? AND cliente_id = ? AND estado = ?', $_SESSION["USER_ID"], $cliente_id, 'em lancamento')));

        if ($fatura == null) {
                $model_fatura = new Fatura();
                $model_fatura->data = Carbon::now()->toDateTimeString();
                $model_fatura->valortotal = 0.00;
                $model_fatura->ivatotal = 0.00;
                $model_fatura->estado = 'em lancamento';
                $model_fatura->user_id = $_SESSION["USER_ID"];
                $model_fatura->cliente_id = $cliente_id;
                $model_fatura->save();
                $this->redirectToRoute('linhafatura' , 'create', ['fatura_id'=> $model_fatura->id]);
        } else {

            $this->redirectToRoute('linhafatura', 'create',  ['fatura_id'=> $fatura->id]);
        }
    }

    public function emitir($fatura_id)
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        $fatura = Fatura::find(array('conditions' => array('id = ?', $fatura_id)));

        $linhasFatura = Linhafatura::all(array('conditions' => array('fatura_id = ?', $fatura_id)));


        if($linhasFatura != null){
            foreach ($linhasFatura as $linha){
                $produto = Produto::find(array('conditions' => array('id = ?', $linha->produto_id)));
                $produto->stock -= $linha->quantidade;
                $produto->save();
            }
            $fatura->estado = 'emitida';
            $fatura->save();

            $this->redirectToRoute('linhafatura', 'create',  ['fatura_id'=> $fatura->id ,'linhasfatuta'=> $fatura->id]);

        } else {
            $this->redirectToRoute('linhafatura', 'create',  ['fatura_id'=> $fatura->id ,'linhasfatuta'=> $fatura->id]);
        }

    }
    public function cancelar($fatura_id)
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        $linhasFatura = Linhafatura::all(array('conditions' => array('fatura_id = ?', $fatura_id)));
        $fatura = Fatura::find(array('conditions' => array('id = ?', $fatura_id)));

        if($linhasFatura != null){
            $valorTotal = 0;
            $ivaTotal = 0;
            foreach ($linhasFatura as $linha){
                $produto = Produto::find(array('conditions' => array('id = ?', $linha->produto_id)));
                $produto->stock += $linha->quantidade;
                $produto->save();
            }
            $fatura->valortotal = $valorTotal;
            $fatura->ivatotal =  $ivaTotal;
            $fatura->estado = 'cancelada';
            $fatura->save();
            $this->redirectToRoute('fatura', 'index');

        } else {
            $fatura->estado = 'cancelada';
            $fatura->save();
            $this->redirectToRoute('fatura', 'index');
        }


    }


}