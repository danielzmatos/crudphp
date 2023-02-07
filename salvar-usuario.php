<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nasc = $_POST["data_nasc"];

        $sql = "INSERT INTO usuarios (nome, email, senha, data_nasc) VALUES ('{$nome}','{$email}','{$senha}','{$data_nasc}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastro Efetuado com Sucesso!');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Falha ao cadastrar!');</script>";
            print "<script>location.href='?page=listar';</script>";
        }

        break;


    case 'editar':
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nasc = $_POST["data_nasc"];

        $sql = "UPDATE usuarios SET
                    nome = '{$nome}',
                    email= '{$email}',
                    senha= '{$senha}',
                    data_nasc= '{$data_nasc}'
                WHERE
                    id=" . $_REQUEST["id"];

        $res = $conn->query($sql);


        if ($res == true) {
            print "<script>alert('Edição do cadastro efetuada!');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Falha ao editar cadastro!');</script>";
            print "<script>location.href='?page=listar';</script>";
        }

        break;

    case 'excluir':
        $sql = "DELETE FROM usuarios WHERE id=" . $_REQUEST["id"];
        $res - $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Nao foi possivel Excluir!');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Cadastro Excluido!');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
        break;
}
