<?php

class BaseController
{

    public function redirectToRoute($controller, $action, $params = []){
        $url = 'Location: http://localhost/Fatura_PWS/router.php?c='.$controller. '&'.'a='.$action;
        foreach ($params as $paramKey => $paramValue){
            $url.='&'.$paramKey.'='.$paramValue;
            }
        header($url);

    }

    public function renderView($view, $params = []) {
        extract($params);
        require_once './views/'.$view.'.php';
    }
}