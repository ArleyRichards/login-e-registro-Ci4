<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model {

    protected $table = 'usuarios';
    protected $allowedFields = ['nome', 'email', 'senha'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert($data) {
        $data['data']['senha'] = password_hash($data['data']['senha'], PASSWORD_DEFAULT);
        //var_dump($senhaEncriptada);
        return $data;
    }

}
