// src/Controllers/AuthController.php (adicionar ao final)
public function login($username, $password) {
    $user = $this->user->getUserByUsername($username);
    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        return true;
    }
    return false;
}

public function logout() {
    session_start();
    session_unset();
    session_destroy();
}
?>
