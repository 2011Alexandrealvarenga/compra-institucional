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


<?php require 'pages/footer.php';?>