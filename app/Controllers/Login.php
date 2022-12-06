<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

/**
 * Description of Login
 *
 * @author Arley Richards
 */
class Login extends BaseController {

    public function index() {
        return view('publico/login');
    }

    public function login() {
        $session = session();
        //VERIFICA SE HOUVE SUBMISSÃO DE FORMULÁRIO
        if ($this->request->getMethod() != 'post') {
            return redirect()->to(site_url('login'));
        } else {
            //VALIDAÇÃO DOS CAMPOS DO FORMULÁRIO
            $validacao = $this->validate([
                'email' => 'required',
                'senha' => 'required'
            ]);

            if (!$validacao) {
                echo '<script>console.log("Houve um erro durante a validação")</script>';
                return redirect()->back()->withInput()->with('erro', $this->validator);
            } else {
                echo '<script>console.log("Formulário validado com sucesso!")</script>';
                $usuario = new UsuarioModel();
                //$usuario = $model->where('email', $this->request->getVar('email'))->first();
                $fetchUsuario = $usuario->select('id, nome, email, senha')->where('email', $this->request->getPost('email'))->first();

                if (!$fetchUsuario) {//SE O USUÁRIO NÃO FOR ENCONTRADO
                    return redirect()->back()->withInput()->with('message', 'Email ou Senha não encontrados');
                    echo '<script>console.log("Email ou Senha não encontrados")</script>';
                } else {
                    //VERIFICA SE A SENHA CONFERE COM A DO USUÁRIO
                    if (!password_verify($this->request->getPost('senha'), $fetchUsuario['senha'])) {
                        echo '<script>console.log("Senha digitada: ' . $this->request->getPost('senha') . ' não confere")</script>';
                    } else {
                        echo '<script>console.log("Senha correta")</script>';
                        $this->setUserSession($fetchUsuario);
                        session()->set([
                            "id" => $fetchUsuario['id'],
                            "nome" => $fetchUsuario['nome'],
                            "email" => $fetchUsuario['email']
                        ]);
                        /*
                        echo '<pre>';
                        var_dump(session()->get()['id']);
                        var_dump(session()->get()['nome']);
                        var_dump(session()->get()['email']);*/
                        return redirect()->to('dashboard');
                    }
                }


                //$session->setFlashdata('success', 'Successful Registration');                
            }
        }//FIM DO ELSE
    }

    private function setUserSession($user) {
        $data = [
            'id' => $user['id'],
            'nome' => $user['nome'],
            'email' => $user['email'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

}
