<?php 
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$erro = isset($_SESSION['erro_cadastro']) ? $_SESSION['erro_cadastro'] : '';
unset($_SESSION['erro_cadastro']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - MIAUAU Consultoria</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="auth-bg">
    <div class="auth-card">
        <div class="auth-logo">
            <h2 style="font-weight:800; color:var(--primary-color)">MIAUAU</h2>
            <h2 style="margin-top:10px;">Crie sua Conta</h2>
            <p>Seja um parceiro da MIAUAU</p>
        </div>
        
        <?php if($erro): ?>
            <div class="alert alert-error"><?php echo $erro; ?></div>
        <?php endif; ?>

        <form action="processa_cadastro.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome da Empresa / Responsável</label>
                <input type="text" id="nome" name="nome" required placeholder="Ex: Clínica Vet / João">
            </div>
            <div class="form-group">
                <label for="email">E-mail Corporativo</label>
                <input type="email" id="email" name="email" required placeholder="contato@empresa.com.br">
            </div>
            <div class="form-group">
                <label for="senha">Crie uma Senha</label>
                <input type="password" id="senha" name="senha" required minlength="6" placeholder="No mínimo 6 caracteres">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px;">Finalizar Cadastro</button>
            
            <div class="auth-links">
                <p style="margin-bottom: 10px;">Já possui cadastro? <a href="login.php">Faça login aqui</a></p>
                <p><a href="index.php">⬅ Voltar para o site</a></p>
            </div>
        </form>
    </div>
</body>
</html>