<?php
session_start();
require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $conn->real_escape_string(trim($_POST['nome']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $check = $conn->query("SELECT id FROM usuarios WHERE email = '$email'");
    if($check->num_rows > 0) {
        $_SESSION['erro_cadastro'] = 'Este e-mail já está cadastrado.';
        header('Location: cadastro.php');
        exit();
    }

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    
    if ($conn->query($sql) === TRUE) {
        $_SESSION['sucesso_cadastro'] = 'Cadastro realizado com sucesso! Faça seu login.';
        header('Location: login.php');
    } else {
        $_SESSION['erro_cadastro'] = 'Erro ao cadastrar. Tente novamente.';
        header('Location: cadastro.php');
    }
}
?>