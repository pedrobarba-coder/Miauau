<?php 
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$sucesso = isset($_GET['status']) && $_GET['status'] == 'sucesso';
require_once 'includes/header.php'; 
?>
    <main>
        <!-- Atualizado header para contexto de consultoria -->
        <section class="page-header">
            <div class="container">
                <h1>Fale Conosco</h1>
                <p>Entre em contato para solicitar orçamentos, tirar dúvidas ou propor parcerias</p>
            </div>
        </section>
        
        <section style="background-color: var(--light-bg); padding: 60px 0;">
            <div class="container">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
                    
                    <!-- Informações de Contato Atualizadas -->
                    <div class="card" style="height: fit-content;">
                        <h2 style="font-size: 24px; margin-bottom: 20px; color: var(--dark-bg);">Informações de Contato</h2>
                        
                        <p style="margin-bottom: 10px;"><strong>Endereço:</strong> <br><span style="color: var(--text-light); font-size: 15px;">Av. Salgado Filho, 3501 - Centro, Guarulhos - SP, 07115-000</span></p>
                        <p style="margin-bottom: 10px;"><strong>WhatsApp:</strong> <br><a href="https://wa.me/5511967692548" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">(11) 96769-2548</a></p>
                        <p style="margin-bottom: 10px;"><strong>E-mail:</strong> <br><a href="mailto:contato@miauau.com.br" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">contato@miauau.com.br</a></p>
                        
                        <hr style="margin: 20px 0; border: none; border-top: 1px solid var(--border-color);">
                        
                        <div class="info-contato-box" style="margin-bottom: 20px;">
                            <h3 style="color: var(--dark-bg); margin-bottom: 10px; font-size: 18px;">Horário de Atendimento</h3>
                            <p style="color: var(--text-light); font-size: 15px;">Segunda a Sexta: 09:00 - 18:00</p>
                            <p style="color: var(--text-light); font-size: 15px;">Sábados: 10:00 - 14:00</p>
                            <p style="color: var(--text-light); font-size: 14px; margin-top: 5px; font-style: italic;">Consultorias e orçamentos sem compromisso</p>
                        </div>

                        <hr style="margin: 20px 0; border: none; border-top: 1px solid var(--border-color);">

                        <div class="info-contato-box">
                            <h3 style="color: var(--dark-bg); margin-bottom: 10px; font-size: 18px;">Redes Sociais</h3>
                            <p style="color: var(--text-light); font-size: 14px; margin-bottom: 10px;">Acompanhe nossos projetos e novidades:</p>
                            <p style="color: var(--text-light); margin-bottom: 5px;"><strong>Instagram:</strong> <span style="color: var(--primary-color); font-weight: 600;">@miauau.tech</span></p>
                            <p style="color: var(--text-light);"><strong>LinkedIn:</strong> <span style="color: var(--primary-color); font-weight: 600;">MIAUAU Consultoria</span></p>
                        </div>
                    </div>
                    
                    <!-- Formulário com Assunto e Validação -->
                    <div class="card">
                        <h2 style="margin-bottom: 25px; color: var(--dark-bg);">Envie sua Mensagem</h2>
                        
                        <?php if($sucesso): ?>
                            <div class="alert alert-success" style="padding: 12px; border-radius: 6px; margin-bottom: 20px; font-size: 14px; text-align: center; background-color: #D1FAE5; color: #065F46; border: 1px solid #34D399;">Mensagem enviada com sucesso! Entraremos em contato em breve.</div>
                        <?php endif; ?>

                        <form id="formContato" action="processa_contato.php" method="POST">
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="nome" style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 14px; color: var(--text-dark);">Nome Completo *</label>
                                <input type="text" id="nome" name="nome" required placeholder="Seu nome completo" style="width: 100%; padding: 12px 16px; border: 1px solid var(--border-color); border-radius: 6px; font-family: inherit; transition: all 0.3s;">
                                <span class="erro" id="erroNome" style="color: var(--error-color); font-size: 13px; display: block; margin-top: 5px;"></span>
                            </div>
                            
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="email" style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 14px; color: var(--text-dark);">E-mail *</label>
                                <input type="email" id="email" name="email" required placeholder="seu@email.com" style="width: 100%; padding: 12px 16px; border: 1px solid var(--border-color); border-radius: 6px; font-family: inherit; transition: all 0.3s;">
                                <span class="erro" id="erroEmail" style="color: var(--error-color); font-size: 13px; display: block; margin-top: 5px;"></span>
                            </div>

                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="assunto" style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 14px; color: var(--text-dark);">Assunto *</label>
                                <select id="assunto" name="assunto" required style="width: 100%; padding: 12px 16px; border: 1px solid var(--border-color); border-radius: 6px; font-family: inherit; background-color: white; cursor: pointer; transition: all 0.3s;">
                                    <option value="">Selecione um assunto</option>
                                    <option value="orcamento">Solicitar Orçamento</option>
                                    <option value="consultoria">Consultoria Técnica</option>
                                    <option value="parceria">Proposta de Parceria</option>
                                    <option value="duvida">Dúvidas Gerais</option>
                                    <option value="outro">Outro</option>
                                </select>
                                <span class="erro" id="erroAssunto" style="color: var(--error-color); font-size: 13px; display: block; margin-top: 5px;"></span>
                            </div>

                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="mensagem" style="display: block; margin-bottom: 8px; font-weight: 600; font-size: 14px; color: var(--text-dark);">Mensagem *</label>
                                <textarea id="mensagem" name="mensagem" required rows="6" placeholder="Descreva sua necessidade, projeto ou dúvida..." style="width: 100%; padding: 12px; border: 1px solid var(--border-color); border-radius: 6px; font-family: inherit; resize: vertical; transition: all 0.3s;"></textarea>
                                <span class="erro" id="erroMensagem" style="color: var(--error-color); font-size: 13px; display: block; margin-top: 5px;"></span>
                            </div>
                            
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Enviar Mensagem</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Script de validação restaurado -->
    <script>
        document.getElementById('formContato').addEventListener('submit', function(e) {
            let valido = true;
            let nome = document.getElementById('nome').value.trim();
            let email = document.getElementById('email').value.trim();
            let assunto = document.getElementById('assunto').value;
            let mensagem = document.getElementById('mensagem').value.trim();

            document.getElementById('erroNome').textContent = '';
            document.getElementById('erroEmail').textContent = '';
            document.getElementById('erroAssunto').textContent = '';
            document.getElementById('erroMensagem').textContent = '';

            if (nome === '') {
                document.getElementById('erroNome').textContent = 'Nome é obrigatório';
                valido = false;
            }

            if (email === '') {
                document.getElementById('erroEmail').textContent = 'E-mail é obrigatório';
                valido = false;
            } else if (!email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                document.getElementById('erroEmail').textContent = 'E-mail inválido';
                valido = false;
            }

            if (assunto === '') {
                document.getElementById('erroAssunto').textContent = 'Selecione um assunto';
                valido = false;
            }

            if (mensagem === '') {
                document.getElementById('erroMensagem').textContent = 'Mensagem é obrigatória';
                valido = false;
            }

            if (!valido) {
                e.preventDefault();
            }
        });
    </script>

<?php require_once 'includes/footer.php'; ?>