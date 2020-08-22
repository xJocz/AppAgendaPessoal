<?php

    require 'classe_contato.php';
    require 'conexao.php';

    $dirUploads = 'upload';
    $file = $_FILES;

    if(!is_dir($dirUploads)) {
        mkdir($dirUploads);
    }

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'insert') {
        $contato = new Contato();
        $contato->__set('nome', $_POST['nome']);
        $contato->__set('telefone', $_POST['telefone']);
        $contato->__set('email', $_POST['email']);

        if($_FILES['file']['error'] == '4') {
            $contato->__set('foto', 'default.jpg');
        } else {
            $contato->__set('foto', nameFile());
            uploadFile($dirUploads, $contato->__get('foto'));
        }
        
        $con = new Conexao();
        $query = "INSERT INTO tb_contato (nome, telefone, email, foto) VALUES (:nome, :telefone, :email, :foto)";
        
        $stmt = $con->conectar()->prepare($query);
        $stmt->bindValue(':nome', $contato->__get('nome'));
        $stmt->bindValue(':telefone', $contato->__get('telefone'));
        $stmt->bindValue(':email', $contato->__get('email'));
        $stmt->bindValue(':foto', $contato->__get('foto'));

            if($stmt->execute()) {
                header('Location: index.php?code=insert');
            }
    }

    if($acao == 'select') {
    
        $con = new Conexao();
        $query = "SELECT * FROM tb_contato";

        $stmt = $con->conectar()->prepare($query);
        $stmt->execute();
        $listagem = $stmt->fetchAll(PDO::FETCH_OBJ);
        
    }

    if($acao == 'search') {
    
        $contato = new Contato();
        $contato->__set('nome', $_POST['nome']);

        $con = new Conexao();
        $query = "SELECT * FROM tb_contato WHERE nome = :nome";

        $stmt = $con->conectar()->prepare($query);
        $stmt->bindValue(':nome', $contato->__get('nome'));
        
        $stmt->execute();
        $pesquisa = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        
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
        $contato->__set('foto', nameFile());
        uploadFile($dirUploads, $contato->__get('foto'));

        $con = new Conexao();
        $query = "UPDATE tb_contato SET nome = :nome, telefone = :telefone, email = :email, foto = :foto WHERE id = :id";

        $stmt = $con->conectar()->prepare($query);
        $stmt->bindValue(':nome', $contato->__get('nome'));
        $stmt->bindValue(':telefone', $contato->__get('telefone'));
        $stmt->bindValue(':email', $contato->__get('email'));
        $stmt->bindValue(':foto', $contato->__get('foto'));
        $stmt->bindValue(':id', $contato->__get('id'));
        if($stmt->execute()) {
            header('Location: index.php?code=update');
        }
    }

    function nameFile() {
        if(isset($_FILES['file'])) {
            $filename = $_FILES['file']['name'];
            $ext = strtolower(strstr($filename, '.'));
            $newfilename = md5(time()) . $ext;
            return $newfilename; 
        }
    }

    function uploadFile($dirUploads, $newName) {

        if ($_FILES['file']['type'] == 'image/jpeg' || $_FILES['file']['type'] == 'image/gif' || $_FILES['file']['type'] == 'image/png') {
            move_uploaded_file($_FILES['file']['tmp_name'], $dirUploads . DIRECTORY_SEPARATOR . $newName);
        } else {
            echo 'Tipo de arquivo não suportado';
        }
    }

?>