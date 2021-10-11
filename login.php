<?php require 'pages/header.php' ;?>
<div class="container">
	<h1>Login</h1>
	<?php require 'classes/usuarios.class.php';
	$u = new Usuarios();
	// se o campo nome nao esta vazio
	if(isset($_POST['email']) && !empty($_POST['email'])){

		// filtrar 
		$email = addslashes($_POST['email']);
		$senha = $_POST['senha'];

		// se fizer login, fazer fazer redirecionamento, senão aparece uma mensagem
		if($u->login($email, $senha)){
			?>
			<!-- redireciona para a pagina inicial -->
			<script type="text/javascript">window.location.href="./";</script>
			<?php 
		} else{
			?>
			<div class="alert alert-warning">
				Usuario ou senha errados!
			</div>
			<?php 
		}
	}
	;?>
	<form method="POST">

		<div class="form-group">
			<label for="email">E-mail:</label>
			<input type="email" name="email" id="email" class="form-control"/>
		</div>
		<div class="form-group">
			<label for="senha">Senha:</label>
			<input type="password" name="senha" id="senha" class="form-control"/>
		</div>

		<input type="submit" value="Fazer Login" class="btn btn-default"/>
	</form>
</div>
	
<?php require 'pages/footer.php' ;?>