<?php 
require 'classes/anuncios.class.php';
$a = new Anuncios();
if(isset($_GET['id']) && !empty($_GET['ID'])){
    $a->excluirAnuncio($_GET['id']);
}
;?>