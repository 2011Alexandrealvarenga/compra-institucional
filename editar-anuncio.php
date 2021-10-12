<?php require 'pages/header.php'; ?>
<?php 
// se nao estiver logado, direciona para a pagina de login
if(empty($_SESSION['cLogin'])){
    ?>
    <script type="text/javascript">window.location.href="login.php";</script>
    <?php 
    exit;
}
require 'classes/anuncios.class.php';
$a = new Anuncios();
if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
    $titulo = addslashes($_POST['titulo']);
    $categoria = addslashes($_POST['categoria']);
    $valor = addslashes($_POST['valor']);
    $descricao = addslashes($_POST['descricao']);
    $estado = addslashes($_POST['estado']);

    $a->addAnuncio($titulo, $categoria, $valor, $descricao, $estado);
    ;?>
    <div class="alert alert-success">
        Produto adicionado com sucesso!
    </div>
    <?php 
}
// pega as informacoes
// se o id foi passado e nao esta vazio, senao vai para meus-anuncios
if(isset($_GET['id']) && !empty($_GET['id'])){
    $info= $a->getAnuncio($_GET['id']);
}else{
    ?>
    <script type="text/javascript">window.location.href="meus-anuncios.php";</script>
    <?php 
    exit;
}
;?>
<div class="container">
    <h1>Meus Anuncios - Editar Anuncio</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria" class="form-control">
                <?php 
                require 'classes/categorias.class.php';
                $c = new Categorias();
                $cats = $c->getLista();

                foreach($cats as $cat):              
                ;?>
                <option value="<?php echo $cat['id'] ;?>"> <?php echo utf8_encode($cat['nome']) ;?></option>
                <?php endforeach ;?>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" class="form-control">
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea type="text" name="descricao" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="estado">Estado de Conservação:</label>
                <select name="estado" id="estado" class="form-control">
                    <option value="0">Ruim</option>
                    <option value="1">Bom</option>
                    <option value="2">Otimo</option>
                </select>
        </div>
        <input type="submit" value="Salvar" class="btn btn-default" />
    </form>
</div>

<?php require 'pages/footer.php';?>