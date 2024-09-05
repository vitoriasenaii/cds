// src/Controllers/AuthController.php (adicionar ao final)
public function checkAccess($requiredRole) {
    if ($_SESSION['role'] !== $requiredRole) {
        echo "Acesso negado!";
        exit;
    }
}
?>
