<?php require 'pages/header.php' ;?>
<div class="container">
	<h1>Cadastre-se</h1>
	<?php require 'classes/usuarios.class.php';
	$u = new Usuarios();
	// se o campo nome nao esta vazio
	if(isset($_POST['nome']) && !empty($_POST['nome'])){

		// filtrar 
		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);
		$senha = $_POST['senha'];
		$telefone = addslashes($_POST['telefone']);

		// se os campos nao estao vazio, enviará
		if(!empty($nome) && !empty($email) && !empty($senha)){
			// se o cadastro estiver ok entao, senao 
			if($u->cadastrar($nome, $email, $senha, $telefone)){
				?>
				<div class="alert alert-success">
					<strong>Parabnes</strong> Cadastrado com sucesso. <a href="login.php" class="alert-link">Faça o login agora </a>
				</div>
				<?php 
			} else {
				?>
				<div class="alert alert-warning">
					<strong>Este usuario ja existe! </strong><a href="login.php" class="alert-link">Faça o login agora </a>
				</div>
				<?php 
			}

		}else{
			?>
			<div class="alert alert-warning">
				Preencha todos os campos!
			</div>
			<?php 
		}
	}
	;?>
	<form method="POST">
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" name="nome" id="nome" class="form-control"/>
		</div>
		<div class="form-group">
			<label for="email">E-mail:</label>
			<input type="email" name="email" id="email" class="form-control"/>
		</div>
		<div class="form-group">
			<label for="senha">Senha:</label>
			<input type="password" name="senha" id="senha" class="form-control"/>
		</div>
		<div class="form-group">
			<label for="telefone">telefone:</label>
			<input type="text" name="telefone" id="telefone" class="form-control"/>
		</div>
		<input type="submit" value="Cadastrar" class="btn btn-default"/>
	</form>
</div>
	
<?php require 'pages/footer.php' ;?>