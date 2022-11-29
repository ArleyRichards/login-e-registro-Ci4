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
        return view('geral/login');
    }

    public function login() {
        $session = session();
        //VERIFICA SE HOUVE SUBMISSÃO DE FORMULÁRIO
        if ($this->request->getMethod() != 'post') {
            return redirect()->to(site_url('geral/login'));
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
                $model = new UsuarioModel();
                $usuario = $model->where('email', $this->request->getVar('email'))->first();

                $this->setUserSession($usuario);
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('dashboard');
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
