<?php require 'pages/header.php' ;?>
<?php 
require 'classes/anuncios.class.php';
require 'classes/usuarios.class.php';
$a = new Anuncios();
$u = new Usuarios();
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = addslashes($_GET['id']);
}else{

    exit;
}

$info = $a->getAnuncio($id);
?>
	<div class="container-fluid">
		<div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-8">
                <h1> <?php echo $info['titulo'] ;?></h1>
                <h4> <?php echo $info['categoria'] ;?></h4>
                <h4> <?php echo $info['descricao'] ;?></h4>
                <h4> R$ <?php echo number_format($info['valor'], 2) ;?> </h4>
                <h4> <?php echo $info['telefone'] ;?></h4>
              
            </div>
		</div>
	</div>
	
	<?php require 'pages/footer.php' ;?>