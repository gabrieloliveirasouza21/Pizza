<?php 

include('conexao.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$nascimento = $_POST['nascimento'];

$erro = false;

if (empty($nome)){
    $erro = "Preencha o nome";
}

if(empty($email) || !filter_var($email, FILTER_VALIDADE_EMAIL)){
    $erro = "preencha email";
}

if(!empty($nascimento)){
    $pedaco = explode('/', $nascimento);
    
    if(count($pedaco) == 3) {
        $nascimento = implode('-', array_reverse($pedaco));
    } else{
        $erro = "A data de Nascimento está incorreta.";
    }
}

if(!empty($telefone)){
    if(strlen($telefone) != 22){
        $erro="O telefone de ve ser preenchido no padrão +xx (xx) 9xxxx-xxxx";
    }
}

if($erro){
    echo "<b>" . $erro . "</b>";
} else {

     $codigoSQL= "INSERT INTO clientes(nome,email,telefone,nascimento, data) VALUES('$nome','$email','$telefone','$nascimento', NOW())";

    $instrucaoMySQL = $mysqli->query($codigoSQL) or die($mysqli->error . " X( " );

    if($instrucaoMySQL){
        echo "Cliente Cadastrado com Sucesso !!!";
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="" method="post">
    Nome: <input type="text" name="nome" id=""> <br><br>
    Nascimento : <input type="text" name="nascimento" id=""><br><br>
    Telefone: <input type="text" name="telefone" id=""><br><br>
    Email: <input type="email" name="email" id=""><br><br>
    <button type="submit">Enviar</button>

    </form>

</body>
</html>