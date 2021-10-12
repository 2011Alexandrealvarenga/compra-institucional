<?php require 'pages/header.php'; ?>
<?php 
// se nao estiver logado, direciona para a pagina de login
if(empty($_SESSION['cLogin'])){
    ?>
    <script type="text/javascript">window.location.href="login.php";</script>
    <?php 
    exit;
}
;?>
<div class="container">
    <h1>Meus Anuncios - Adicionar Anuncio</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria" class="form-control">
                <option value=""></option>
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
        <input type="submit" value="Adicionar" class="btn btn-default" />
    </form>
</div>

<?php require 'pages/footer.php';?>