<?php

require_once('model/AlunoModel.php');

class AlunoController {
    private $alunoModel;

    public function __construct() {
        $this->userModel = new AlunoModel();
    }

    public function create($alunoData) {
        $this->alunoModel->setAttribute('name', $userData['name']);
        $this->alunoModel->setAttribute('email', $userData['email']);
        $this->alunoModel->setAttribute('phone', $userData['phone']);
        $this->alunoModel->save();

        // redireciona para página de listagem de usuários
        header('Location: /users/list');
    }

    public function list() {
        // recupera todos os usuários do banco de dados
        $alunos = $this->alunoModel->getAllAttributes();

        // carrega a view de listagem de usuários
        require_once('view/aluno/list.php');
    }
}