<?php 
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$erro = isset($_SESSION['erro_login']) ? $_SESSION['erro_login'] : '';
$sucesso = isset($_SESSION['sucesso_cadastro']) ? $_SESSION['sucesso_cadastro'] : '';
unset($_SESSION['erro_login'], $_SESSION['sucesso_cadastro']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MIAUAU Consultoria</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="auth-bg">
    <div class="auth-card">
        <div class="auth-logo">
            <h2 style="font-weight:800; color:var(--primary-color)">MIAUAU</h2>
            <h2 style="margin-top:10px;">Acesse o Portal</h2>
                <p style="color: var(--text-light); font-size: 14px; margin-top: 5px;">Entre com suas credenciais</p>
        </div>
        
        <?php if($sucesso): ?>
            <div class="alert alert-success"><?php echo $sucesso; ?></div>
        <?php endif; ?>
        
        <?php if($erro): ?>
            <div class="alert alert-error"><?php echo $erro; ?></div>
        <?php endif; ?>

        <form action="processa_login.php" method="POST">
            <div class="form-group">
                <label for="email">E-mail Corporativo</label>
                <input type="email" id="email" name="email" required placeholder="ex: contato@suaempresa.com.br">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required placeholder="••••••••">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px;">Fazer Login</button>
            
            <div class="auth-links">
                <p style="margin-bottom: 10px;">Não tem uma conta? <a href="cadastro.php">Cadastre-se agora</a></p>
                <p><a href="index.php">⬅ Voltar para o site</a></p>
            </div>
        </form>
    </div>
</body>
</html>