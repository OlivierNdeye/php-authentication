<?php
    include('protect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Painel</title>
</head>
<body>
    <h1>Bem vindo ao painel,</h1> <?php echo $_SESSION['nome']; ?>
    
    <p>
    <a href="logout.php"> 
    <br/><button>Sair</button> </a>
    </p>
</body>
</html>