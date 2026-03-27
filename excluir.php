
<!DOCTYPE html>
<html>
<head>
    <title>Excluir Contato</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .box {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2 {
            color: #2c3e50;
        }

        .sucesso {
            color: #27ae60;
        }

        .erro {
            color: #e74c3c;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: white;
            background-color: #3498db;
            padding: 10px 15px;
            border-radius: 5px;
        }

        a:hover {
            background-color: #2980b9;
        }
    </style>
</head>


<?php
include('conexao.php');

if (isset($_GET['id'])) {


    $id = $_GET['id'];

    // echo "<script>confirm('Deseja realmente excluir o contato $id?');</script>";

    $sql = "DELETE FROM contatos WHERE id = $id";


    if (mysqli_query($conexao, $sql)) {
        echo "<h2>Contato excluído com sucesso.</h2>";
        echo "<a href='index.php'>Voltar</a>";
        exit;
    } else {
        echo "<h2>Erro ao excluir o contato.</h2>" . mysqli_error($conexao);
        echo "<a href='index.php'>Voltar</a>";
        exit;
    }
}
?>