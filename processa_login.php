<?php
session_start();
require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $conn->real_escape_string(trim($_POST['email']));
    $senha = $_POST['senha'];

    $result = $conn->query("SELECT * FROM usuarios WHERE email = '$email'");
    
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            header('Location: index.php');
            exit();
        } else {
            $_SESSION['erro_login'] = 'Senha incorreta.';
            header('Location: login.php');
        }
    } else {
        $_SESSION['erro_login'] = 'E-mail não encontrado no sistema.';
        header('Location: login.php');
    }
}
?>