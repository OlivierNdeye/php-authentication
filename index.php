<?php
   include('conexao.php');

   if(isset($_POST['email']) || isset($_POST['senha'])) {

        if(strlen($_POST['email']) == 0) {
            echo "Email invalido. Prencha novamente seu email.";
        } else if(strlen($_POST['senha']) == 0) {
            echo "Senha invalida. Preencha novamente sua senha.";
        } else {

            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM usuarios WHERE email ='$email' AND senha ='$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: ". $mysqli->error);

            $quantidade =$sql_query->num_rows; 

            if($quantidade == 1) {

                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];   

                header("Location: painel.php");


            } else {
                echo "Login error. Email ou senha incorreto";
            }
        }
   }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <link rel="stylesheet" href="./main.css">
    </head>
    <body>
        <div class="wrapper">
            <!--div class="login-form">
                <div class="login-icon">
                    <img src="./assets/logo nova.png" alt="icone riosaude">
                </div-->

                
                <form action="" method="POST" class="login-form">

                     <label for="username" hidden> Usuário </label>
                     <input type="text" name="email" placeholder="usuario" autofocus/>
                     <br/><br/>           
                     <label for="passwr" hidden> Senha </label>
                     <input type="password" name="senha" placeholder="Senha" autofocus/>
                     <br/><br/>
                     <input type="submit" class="enviar"/>
                              
                </form>
                <h3>
                    Não possui cadastro. Clique  <a href="login.php"> aqui </a>
                </h3>
            </div>
        </div>
        
        <script src="main.js" async defer></script>
    </body>
</html>