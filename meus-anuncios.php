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
    <h1>Meus Anuncios</h1>
    <a href="add-anuncio.php" class="btn btn-default">Adicionar Anuncio</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>FOTO</th>
                <th>TITULO</th>
                <th>VALOR</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <?php require 'classes/anuncios.class.php';
        $a = new Anuncios();
        // retorna o anuncios do usuario logado
        $anuncios = $a->getMeusAnuncios();

        foreach($anuncios as $anuncio):
        ;?>
        <tr>
            <td>
                <?php if(!empty($anuncio['url'])) :?>
                <img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" height="30px" border="0" />
                <?php else: ?>
                <img src="assets/images/anuncios/default.jpg" height="30px" border="0" />
                <?php endif ;?>
            </td>
            <td><?php echo $anuncio['titulo'] ;?> </td>
            <td>R$ <?php echo number_format($anuncio['valor'], 2) ;?> </td>
            <td>
                <a href="editar-anuncio.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-default">Editar</a>
                <a href="excluir-anuncio.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-default">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php require 'pages/footer.php';?>