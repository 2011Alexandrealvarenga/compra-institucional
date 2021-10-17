<?php require 'pages/header.php' ;?>
<?php 
require 'classes/anuncios.class.php';
require 'classes/usuarios.class.php';
$a = new Anuncios();
$u = new Usuarios();

$total_anuncios = $a->getTotalAnuncios();
$total_usuarios = $u->getTotalUsuarios();

$p = 1;
if(isset($_GET['P']) && !EMPTY($_GET['p'])){
	$p = addslashes($_GET['p']);
}

// 2 é o numero de itens por pagina
$por_pagina = 2;
$total_paginas = ceil($total_anuncios / $por_pagina);
$anuncios = $a->getUltimosAnuncios($p, $por_pagina);
;?>
	<div class="container-fluid">
		<div class="jumbotron">
			<h2>nos temos hoje <?php echo $total_anuncios ;?> anuncios</h2>
			<p>e mais <?php echo $total_usuarios ;?> usuarios cadastrados</p>

		</div>
		<div class="row">
			<div class="col-sm-3">
				<h4>Pesquisa avançada</h4>
			</div>
			<div class="col-sm-9">
				<h4>Ultimos Anuncios</h4>
				<table class="table table-striped">
					<tbody>
						<?php foreach($anuncios as $anuncio): ?>
						<tr>
							<td>
								<?php if(!empty($anuncio['url'])): ?> 
								<img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" height="50" alt="">
								<?php else: ?>
								<img src="assets/images/default.jpg" height="50" border="0" alt="">
								<?php endif; ?>
							</td>
							<td>
								<a href="produto.php?id=<?php echo $anuncio['id']; ?>">
								<?php echo $anuncio['titulo'] ;?></a><br>
								<?php echo utf8_encode($anuncio['categoria']) ;?>
							</td>
							<td>								
								<?php echo $anuncio['descricao'] ;?></a>
							</td>
							<td>
								R$ <?php echo number_format($anuncio['valor'], 2); ?>
							</td>
						</tr>						
						<?php endforeach; ?>
					</tbody>
				</table>
				<ul class="pagination">
					<?php for($q=1;$q<=$total_paginas;$q++): ?>
						<li class="<?php echo ($p==$q)?'active':'';	?>"><a href="index.php?p=<?php echo $q; ?>"><?php echo $q; ?></a></li>
					<?php endfor; ?>
				</ul>						
			</div>
		</div>
	</div>
	
	<?php require 'pages/footer.php' ;?>