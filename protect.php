<?php
    if(!isset($_SESSION)) {
        session_start();
    }


    if(!isset($_SESSION['id'])) {
    die("Você não pode acessar essa pagina! 
    <br/>Faça seu login <a href=\"index.php\">aqui</a>");
    }
?>