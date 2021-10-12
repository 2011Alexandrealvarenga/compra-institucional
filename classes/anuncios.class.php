<?php 
class Anuncios {
    public function getMeusAnuncios(){
        global $pdo;

        $array = array();        
        $sql = $pdo->prepare("SELECT 
        *,
        (select anuncios_imagens.url from anuncios_imagens where anuncios_imagens
        .id_anuncio = anuncios.id limit 1) as url
         FROM anuncios 
         WHERE id_usuario = :id_usuario");
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->execute();

        // verifica se tem algum resultado e retorna todos
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }
        return $array;
    }
    // edita anuncio
    public function getAnuncio($id){
        $array = array();
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM anuncios where id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        // se tiver mais que 0 linha
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }
        return $array;
    }
    public function editAnuncio($titulo, $categoria, $valor, $descricao, $estado, $id){
        global $pdo;
        $sql = $pdo->prepare('UPDATE anuncios SET 
        titulo = :titulo,
        id_categoria = :id_categoria,
        id_usuario = :id_usuario,
        descricao = :descricao,
        valor = :valor,
        estado = :estado
        WHERE id = :id'
    );
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":id_categoria", $categoria);
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":estado", $estado);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
    // fim - edita anuncio

    public function addAnuncio($titulo, $categoria, $valor, $descricao, $estado){
        global $pdo;
        $sql = $pdo->prepare('insert into anuncios set 
        titulo = :titulo,
        id_categoria = :id_categoria,
        id_usuario = :id_usuario,
        descricao = :descricao,
        valor = :valor,
        estado = :estado');
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":id_categoria", $categoria);
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":estado", $estado);
        $sql->execute();
    }

    // excluir anuncio
    public function excluirAnuncio($id){
        global $pdo;

        // excluir imagens dos anuncios
        $sql = $pdo->prepare ("delete from anuncios_imagens where id_anuncio = :id_anuncio");
        $sql->bindValue(":id_anuncio",$id);
        $sql->execute();
        // excluir anuncio
        $sql = $pdo->prepare ("delete from anuncios where id = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();
    }

}
;?>