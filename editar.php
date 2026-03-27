<!DOCTYPE html>
<html>
<head>
    <title>Editar Contatos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #2c3e50;
            margin-top: 30px;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            width: 320px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        input[type="text"] {
            width: 90%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 95%;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #219150;
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
$id = $_GET['id'];
$sql = "SELECT * FROM contatos WHERE id = $id";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) == 1){
    $contato = mysqli_fetch_assoc($resultado);
}else{
    echo "Contato não encontrado.";
    exit;
}
if (isset($_POST ['atualizar'])){

    $novo_nome = $_POST['nome'];
    $novo_endereco = $_POST['endereco'];
    $novo_fone = $_POST['fone'];

    $sql2 = "UPDATE contatos SET nome='$novo_nome', endereco = '$novo_endereco', telefone='$novo_fone' WHERE id = $id";
 if (mysqli_query($conexao,$sql2)){
    echo "<h2>Contato foi atualizado com sucesso!</h2>";
    echo "<a href='index.php'>VOLTAR</a>";
    exit;
 }
else{
    echo"<h2>Erro ao atualizar contato. ". mysqli_error($conexao);
    echo "<a href='index.php'>VOLTAR</a>";
    exit;

}

}

?>
<h1>Edição de contatos</h1>
<form method= "POST">
Nome: <input type = "text" name = "nome" value="<?php echo $contato['nome'];?>"><br><br>
Endereco:  <input type="text" name="endereco" value="<?php echo $contato['endereco'];?>"><br><br>
Telefone: <input type="text" name="fone" value=" <?php echo $contato['telefone'];?>"><br><br>

<input type="submit" name="atualizar" value="Atualizar">

</form>