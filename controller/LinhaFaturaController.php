<?php

class LinhaFaturaController extends BaseAuthController
{
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function create($fatura_id, $produto_id)
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        $empresa = Empresa::find([1]);
        $fatura = Fatura::find([$fatura_id]);
        $linhasFatura = Linhafatura::all(array('conditions' => array('fatura_id = ?', $fatura_id)));

        if(!is_null($produto_id)){
            $produto = Produto::find([$produto_id]);
            if($produto->stock != 0 ){
                $this->renderView('linhafatura/create', ['empresa' => $empresa, 'fatura' => $fatura, 'produto' => $produto, 'linhasFatura' => $linhasFatura]);
            }else{
                $produtos = Produto::all(array('conditions' => array('stock > ?', 0)));
                $erro = "Selecione um produto com stock > 0 ! Obrigado";
                $this->renderView('fatura/produtos', ['produtos' => $produtos , 'fatura' => $fatura , 'erro' => $erro]);
            }
        }else{
            $this->renderView('linhafatura/create', ['empresa' => $empresa, 'fatura' => $fatura, 'linhasFatura' => $linhasFatura]);
        }
    }

    public function selecionarprodutos($fatura_id)
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        if (isset($_POST[('btn_search')])) {
            $search = $_POST['table_search'];
            $fatura = Fatura::find([$fatura_id]);
            $produtos = Produto::find('all', array('conditions' => "referencia LIKE  '%$search%'"));

            $this->renderView('fatura/produtos', ['produtos' => $produtos, 'fatura' => $fatura]);
        }else{
            $produtos = Produto::all(array('conditions' => array('stock > ?', 0)));
            $fatura = Fatura::find([$fatura_id]);
            $this->renderView('fatura/produtos', ['produtos' => $produtos , 'fatura' => $fatura]);
        }


    }


    public function store($fatura_id, $produto_id)
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        $fatura = Fatura::find([$fatura_id]);

        $linhafatura = Linhafatura::find('one', array('conditions' => array('produto_id = ? AND fatura_id = ?', $produto_id, $fatura_id)));

            if ($linhafatura != null) {
                $produtos = Produto::all(array('conditions' => array('stock > ?', 0)));
                $erro = "O produto com a a seguinte referência: " . "<strong>" . $linhafatura->produto->referencia . "</strong>". " já foi adicionado a fatura" . "<br>" . "Escolha outro produto! Obrigado";
                $this->renderView('fatura/produtos', ['produtos' => $produtos , 'fatura' => $fatura , 'erro' => $erro]);
            } else {
                $model_linhafatura = new Linhafatura($_POST);
                $model_linhafatura->produto_id = $produto_id;
                $model_linhafatura->fatura_id = $fatura_id;


                 if($model_linhafatura->is_valid()){
                     $model_linhafatura->save();


                     $linhasFatura = Linhafatura::all(array('conditions' => array('fatura_id = ?', $fatura_id)));

                     $valorTotal = 0;
                     $ivaTotal = 0;
                     foreach ($linhasFatura as $linha){
                         $valorTotal += $linha->quantidade * ($linha->valorunitario + $linha->valoriva);
                         $ivaTotal += $linha->quantidade * $linha->valoriva;
                     }
                     $fatura->valortotal = $valorTotal;
                     $fatura->ivatotal = $ivaTotal;
                     $fatura->save();

                     $this->redirectToRoute('linhafatura', 'create', ['fatura_id' => $model_linhafatura->fatura_id]);

                 } else {
                     $this->redirectToRoute('linhafatura', 'create', ['fatura_id' => $fatura_id , 'produto_id' =>$produto_id]);
                 }

                $this->redirectToRoute('linhafatura', 'create', ['fatura_id' => $fatura_id]);

            }
    }

    public function edit($linhafatura_id)
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        $empresa = Empresa::find([1]);
        $linhaFaturaSelecionada = Linhafatura::find(array('conditions' => array('id = ?', $linhafatura_id)));
        $fatura = Fatura::find(array('conditions' => array('id = ?', $linhaFaturaSelecionada->fatura_id)));
        $linhasFatura = Linhafatura::all(array('conditions' => array('fatura_id = ?', $linhaFaturaSelecionada->fatura_id)));

        $this->renderView('linhafatura/edit', ['empresa' => $empresa , 'fatura' => $fatura, 'linhaFaturaSelecionada' => $linhaFaturaSelecionada, 'linhasFatura' => $linhasFatura]);

    }

    public function update($linhafatura_id)
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);

        $linhaFaturaSelecionada = Linhafatura::find(array('conditions' => array('id = ?', $linhafatura_id)));
        $fatura = Fatura::find(array('conditions' => array('id = ?', $linhaFaturaSelecionada->fatura_id)));

        $linhaFaturaSelecionada->update_attributes($_POST);
        if($linhaFaturaSelecionada->is_valid()){
            $linhaFaturaSelecionada->save();

            $linhasFatura = Linhafatura::all(array('conditions' => array('fatura_id = ?', $fatura->id)));

            $valorTotal = 0;
            $ivaTotal = 0;
            foreach ($linhasFatura as $linha){
                $valorTotal += $linha->quantidade * ($linha->valorunitario + $linha->valoriva);
                $ivaTotal += $linha->quantidade * $linha->valoriva;
            }
            $fatura->valortotal = $valorTotal;
            $fatura->ivatotal = $ivaTotal;
            $fatura->save();

            $this->redirectToRoute('linhafatura', 'create', ['fatura_id' => $fatura->id]);
        }
    }


    public function delete($linhafatura_id)
    {
        $this->loginFilter($this->auth, ['administrador', 'funcionario']);


        $linhaFatura = Linhafatura::find(array('conditions' => array('id = ?', $linhafatura_id)));
        $fatura = Fatura::find(array('conditions' => array('id = ?', $linhaFatura->fatura_id)));

        $fatura->valortotal -= $linhaFatura->quantidade * ($linhaFatura->valorunitario + $linhaFatura->valoriva);
        $fatura->ivatotal -=  $linhaFatura->quantidade * $linhaFatura->valoriva;
        $fatura->save();

        $linhaFatura->delete();

        $this->redirectToRoute('linhafatura', 'create', ['fatura_id' => $fatura->id]);

    }



}