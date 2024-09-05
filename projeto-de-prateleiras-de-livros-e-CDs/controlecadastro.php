// src/Controllers/AuthController.php
<?php
require_once 'src/Models/User.php';

class AuthController {
    private $user;

    public function __construct($db) {
        $this->user = new User($db);
    }

    public function register($username, $password) {
        if ($this->user->getUserByUsername($username)) {
            echo "Usuário já existe!";
            return false;
        }

        if ($this->user->createUser($username, $password)) {
            echo "Usuário registrado com sucesso!";
            return true;
        }

        echo "Erro ao registrar o usuário.";
        return false;
    }
}
?>
