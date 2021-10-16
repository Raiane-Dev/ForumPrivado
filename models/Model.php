<?php

    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $img = $_FILES['img'];
        Controller::uploadImages($img);
        
        $cadastrar = \MySql::connect()->prepare("INSERT INTO `usuarios` VALUES (null, ?, ?, ?, ?)");
        $cadastrar->execute(array($nome,$email,$senha,$img['name']));
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['img'] = $img;

    }

    if(isset($_POST['logar'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $verificarLogin = MySql::connect()->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
        $verificarLogin->execute(array($email,$senha));
        $infoUser = $verificarLogin->fetch();
        if($verificarLogin->rowCount() > 0){
            $_SESSION['id_user'] = $infoUser['id'];
            $_SESSION['nome'] = $infoUser['nome'];
            $_SESSION['email'] = $infoUser['email'];
            $_SESSION['senha'] = $infoUser['senha'];
            $_SESSION['img'] = $infoUser['img'];
                if(isset($_POST['lembrar'])){
                    setcookie('id_user', $infoUser['id'], time() + (60*60*24));
                    setcookie('nome', $infoUser['nome'], time() + (60*60*24));
                    setcookie('email', $infoUser['email'], time() + (60*60*24));
                    setcookie('senha', $infoUser['senha'], time() + (60*60*24));
                    setcookie('img', $infoUser['img'], time() + (60*60*24));
                }
        }else{
            echo '<script> alert("Ops, parece que essa conta não existe."); </script>';
        }
    }


    if(isset($_POST['create'])){
        $id_user = $_SESSION['id_user'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $close_in = $_POST['close_in'];
        $archive = $_FILES['archive'];
        $people = implode(', ',$_POST['people']);
        Controller::uploadImages($archive);
    

        $create = MySql::connect()->prepare("INSERT INTO posts VALUES (null, ?, ?, ?, ?, ?, ?)");
        $create->execute(array($id_user, $title, $description, $close_in, $archive['name'], $people));

    }
    
    if(isset($_POST['reject'])){
        $id = (int)$_POST['id'];
        $posts = MySql::connect()->prepare("SELECT * FROM posts");
        $posts->execute();
        $posts = $posts->fetch();
        $arrayPeoples = explode(', ', $posts['people']);
        $key = array_search($_SESSION['id_user'], $arrayPeoples);
            unset($arrayPeoples[$key]);
            $new_array = implode(', ',$arrayPeoples);
            $update = MySql::connect()->prepare("UPDATE posts SET people = '$new_array' WHERE id = $id");
            $update->execute();
            header(INCLUDE_PATH.'profile?invitation');
    }

?>