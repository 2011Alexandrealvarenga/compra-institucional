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
            <td><img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" border="0" /></td>
            <td><?php echo $anuncio['titulo'] ;?> </td>
            <td>R$ <?php echo number_format($anuncio['valor'], 2) ;?> </td>
            <td></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php require 'pages/footer.php';?>