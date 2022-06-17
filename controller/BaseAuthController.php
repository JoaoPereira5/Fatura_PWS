<?php

class BaseAuthController extends BaseController
{
    public function loginFilter(Auth $auth, array $approvedRoles)
    {
        $role = $auth->getUserLoggedRole();
        if (!$auth->IsUserLoggedIn()) {
            $this->redirectToRoute('auth', 'getLogin');
        }

        if(!in_array($role, $approvedRoles)){
            $this->renderView('layouts/acessonegado');
            //var_dump($role, $approvedRoles);
            die();
        }
    }

}