<?php 
    require_once 'CLASSES/usuarios.php';
    $u = new Usuario;
 ?>

<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Tela Login</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
<div id="corpo-form-Cad">
	<h1>Cadastrar</h1>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
        <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
        <input type="email" name="email" placeholder="Usuário" maxlength="40">
        <input type="password" name="senha" placeholder="Senha" maxlength="15">
        <input type="password" name="confsenha" placeholder="Confirmar Senha" maxlength="15">
        <input type="submit" value="Cadastrar">
    </form>
</div>
<?php 
//verificar se clicou no botão
if(isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarsenha = addslashes($_POST['confsenha']);
    //verificar se está vazio 
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarsenha))
    {
        $u->conectar("projeto_login","localhost","root","");
        if($u->msgErro == "")//todo ok
        {
            if($senha == $confirmarsenha)
            {
                 if($u->cadastrar($nome,$telefone,$email,$senha))
                 {
                    ?>
                    <div id="msg-sucesso">
                     Cadastrado com sucesso! Acesse para entrar!   
                    </div>
                    <?php
                 }
                 else
                 {
                     ?>
                    <div class="msg-erro">
                     Email já cadastrado!   
                    </div>
                    <?php
                 }
            }
            else
            {
                 ?>
                <div class="msg-erro">
                  Senha e Confirmar senha não correspondem!   
                </div>
                <?php
            }
            
        }
        else
        {
            ?>
            <div class="msg-erro">
               <?php echo "Erro: ".$u->msgErro;?>
            </div>
            <?php
        }
    }
    else
    {
         ?>
           <div class="msg-erro">
              preencha todos os campos!   
            </div>
        <?php
    }

}

 ?>
</body>

</html>
