<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

/**
 * Description of Registro
 *
 * @author Arley Richards
 */
class Registro extends BaseController {

    public function index() {
        return view('publico/registro');
    }

    public function salvar() {

        $validate = $this->validate([
            'nome' => 'required',
            'email' => 'required|valid_email|is_unique[usuarios.email]',
            'senha' => 'required|min_length[6]|max_length[100]',
            'confirma_senha' => 'required',
                ], [
            'nome' => [
                'required' => 'O campo Nome é obrigatório'
            ],
            'email' => [
                'required' => 'O campo Email é obrigatório',
                'valid_email' => 'Informe um endereço de Email válido',
                'is_unique' => 'Já existe um usuário cadastrado com esse Email',
            ],
            'senha' => [
                'required' => 'O campo Senha é obrigatório',
                'min_length' => 'Sua senha deve ter pelo menos 6 caracteres',
                'max_length' => 'Sua senha deve menos de 100 caracteres',
            ],
            'confirma_senha' => [
                'required' => 'O campo Senha é obrigatório',
                'min_length' => 'Sua senha deve ter pelo menos 6 caracteres',
                'max_length' => 'Sua senha deve menos de 100 caracteres',
            ],
        ]);

        if (!$validate) {
            return redirect()->route('registro')->with('errors', $this->validator->getErrors());
        } else {
            $usuario = new UsuarioModel();

            $inserted = $usuario->insert($this->request->getPost());

            if (!$inserted) {
                return redirect()->route('registro')->with('error', 'Ocorreu um erro ao cadastrar');
            } else {
                return redirect()->route('registro')->with('success', 'Sucesso no registro');
            }
        }

        var_dump($this->validator->getErrors());
        echo '<script>console.log(' . json_encode($this->validator->getErrors()) . ')</script>';
    }

}
