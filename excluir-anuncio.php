<?php 
require 'config.php';
// verifica se tem algume logado
if(empty($_SESSION['cLogin'])){
    header('location: login.php');
    exit;
}
// fim - verifica se a sessao esta vazia


require 'classes/anuncios.class.php';
$a = new Anuncios();
if(isset($_GET['id']) && !empty($_GET['id'])){
    $a->excluirAnuncio($_GET['id']);
}

// redireciona para home
header("Location: meus-anuncios.php");
;?>