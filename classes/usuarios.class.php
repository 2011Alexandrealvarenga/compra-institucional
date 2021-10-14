<?php 
class Usuarios{
    public function getTotalUsuarios(){
        global $pdo;
        $sql = $pdo->query("SELECT COUNT(*) as c FROM usuarios");
        $row = $sql->fetch();

        return $row['c'];
    }
    public function cadastrar($nome, $email, $senha, $telefone){
        global $pdo;
        // verifica se ja tem um email repetido
        $sql =$pdo->prepare('SELECT id FROM usuarios WHERE email = :email');
        $sql->bindValue(":email", $email);
        $sql->execute();

        // se igual a 0 vou cadastrar senao 
        if($sql->rowCount() == 0){
            $sql = $pdo->prepare('INSERT INTO usuarios SET nome =:nome, email=:email, senha=:senha, telefone=:telefone');
            $sql->bindValue(":nome",$nome);
            $sql->bindValue(":email",$email);
            $sql->bindValue(":senha",md5($senha));
            $sql->bindValue(":telefone",$telefone);
            $sql->execute();
            return true;
        }else{
            return false;
        }
    }
    public function login($email, $senha){
        global $pdo;
        // verificação de login
        $sql = $pdo->prepare('SELECT id FROM usuarios WHERE email = :email AND senha= :senha');

        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', md5($senha));
        $sql->execute();

        // verifica se ja tem usuario com o mesmo usuario e senha
        if($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['cLogin'] = $dado['id'];
            return true;
        } else {
            return false;
        }
    }
}
;?>