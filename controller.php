<?php

    require 'classe_contato.php';
    require 'conexao.php';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'insert') {
        $contato = new Contato();
        $contato->__set('nome', $_POST['nome']);
        $contato->__set('telefone', $_POST['telefone']);
        $contato->__set('email', $_POST['email']);

        $con = new Conexao();
        $query = "INSERT INTO tb_contato (nome, telefone, email) VALUES (:nome, :telefone, :email)";
        
        $stmt = $con->conectar()->prepare($query);
        $stmt->bindValue(':nome', $contato->__get('nome'));
        $stmt->bindValue(':telefone', $contato->__get('telefone'));
        $stmt->bindValue(':email', $contato->__get('email'));
            if($stmt->execute()) {
                header('Location: index.php?code=insert');
            }
    }

    if($acao == 'select') {
    
        $con = new Conexao();
        $query = "SELECT * FROM tb_contato";

        $stmt = $con->conectar()->prepare($query);
        $stmt->execute();
        $lista = $stmt->fetchAll(PDO::FETCH_OBJ);

    }

    if($acao == 'remove') {
    
        $con = new Conexao();
        $query = "DELETE FROM tb_contato WHERE id = :id";

        $stmt = $con->conectar()->prepare($query);
        $stmt->bindValue('id', $_GET['id']);
            if($stmt->execute()) {
                header('Location: index.php?code=remove');
            }
    }

    if($acao == 'update') {

        $contato = new Contato();
        $contato->__set('id', $_POST['idContato']);
        $contato->__set('nome', $_POST['nome']);
        $contato->__set('telefone', $_POST['telefone']);
        $contato->__set('email', $_POST['email']);

        $con = new Conexao();
        $query = "UPDATE tb_contato SET nome = :nome, telefone = :telefone, email = :email WHERE id = :id";

        $stmt = $con->conectar()->prepare($query);
        $stmt->bindValue(':nome', $contato->__get('nome'));
        $stmt->bindValue(':telefone', $contato->__get('telefone'));
        $stmt->bindValue(':email', $contato->__get('email'));
        $stmt->bindValue(':id', $contato->__get('id'));
        if($stmt->execute()) {
            header('Location: index.php?code=update');
        }
    }

?>