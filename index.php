<html>
<head>
    <title>Contatos - Turma 31</title>
</head>
<body>
    <h1>Agenda - Turma 31</h1> <br>
    <h2> Cadastro de contatos </h2>
    <form action="salvar.php" method="POST">
        Nome: <input type="text" name="nome"> <br><br>
        Endereço: <input type="text" name="endereco"> <br><br>
        Telefone: <input type="text" name="fone"> <br><br>
        <input type="submit" value="Cadastrar"> <br>
    </form>
    <h2>Lista de contatos</h2>
    <?php 
        include ('conexao.php');
        $sql = "SELECT * FROM contatos";

        $resultado = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            echo "<table border=1> <tr><th>Nome</th>
            <th>Endereco</th> <th>Telefone></tr>";
            while ($linha = mysqli_fetch_assoc($resultado)){
                echo "<tr><td>". $linha['nome']." </td><td> " . $linha['endereco'] . " </td><td> " . $linha['telefone'] . "</td>
                <td> <a href='editar.php?id=".$linha['id']."'>Editar</a></td>
                <td> <a href='Excluir.php?id=".$linha['id']."'
                onclick='return confirm(\"tem certeza que deseja excluir este regsitro?\")'>Excluir</a></td></tr>";
                
            }
echo "</table>";
        } else {
            echo "<h3> Nenhum contato encontrado! </h3>";
        }

    ?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f6f8;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #2c3e50;
    }

    h2 {
        color: #34495e;
        margin-top: 30px;
    }

    form {
        background-color: #ffffff;
        padding: 15px;
        border-radius: 8px;
        width: 300px;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    }

    input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    input[type="submit"] {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }

    input[type="submit"]:hover {
        background-color: #2980b9;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
        background-color: white;
    }

    table th {
        background-color: #3498db;
        color: white;
        padding: 10px;
    }

    table td {
        padding: 10px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    table tr:hover {
        background-color: #f2f2f2;
    }

    a {
        text-decoration: none;
        color: #3498db;
        font-weight: bold;
    }

    a:hover {
        color: #e74c3c;
    }
</style>

</body>

</html>
