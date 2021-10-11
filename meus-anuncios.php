<?php require 'pages/header.php'; ?>
<div class="container">
    <h1>Meus Anuncios</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>FOTO</th>
                <th>TITULO</th>
                <th>VALOR</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <?php require 'class/anuncios.class.php' ;?>
    </table>
</div>

<?php require 'pages/footer.php';?>