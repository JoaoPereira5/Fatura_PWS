<?php

class AuthController extends BaseController
{
    public function __construct($auth)
    {
        $this->auth = $auth;
    }

    public function getLoginForm(){

        if(isset($_SESSION["USER_ID"])){
            $this->redirectToRoute('auth', 'logout');
        } else{
            $this->renderView('auth/login');
        }

    }

    public function doLogin(){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = User::find_by_username_and_password($username, $password);//encontra os dados do utilizador

        if(!is_null($user)){
            if($user->estado == 'ativo'){
                $authmgr = new Auth();

                $authmgr->setAuthData($user->id, $user->role, $user->username);

                $role = $user->role;

                switch ($role){
                    case 'administrador':
                        $this->redirectToRoute('admin', 'index');
                        break;
                    case 'funcionario':
                        $this->redirectToRoute('funcionario', 'index');
                        break;
                    case 'cliente':
                        $this->redirectToRoute('cliente', 'index');
                        break;

                    default:
                        $this->redirectToRoute('auth', 'getLogin');
                }
            }
            else {
                $erro = 'ERRO! O ' .$user->username . ' encontra-se banido!';
                $this->renderView('auth/login' , ['erro' => $erro]);
            }

        }else{
            $erro = 'ERRO! Username ou Password errados!';
            $this->renderView('auth/login' , ['erro' => $erro]);
        }
    }

    public function logout(){
        $this->auth->Logout();
        $this->redirectToRoute('auth', 'getLogin');
    }
}
