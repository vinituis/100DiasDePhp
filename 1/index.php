<?php

session_start();

if(isset($_POST['idade'])){ 
    $idade = $_POST['idade'];
    $_SESSION['idade'] = $idade;
    conversor();
}else{
    limpar();
}

function conversor() {

    global $idade;
    if(isset($idade)){
        $dias = $idade * 365;
        $msg = 'Você tem ' . $dias . ' dias de vida';
        $_SESSION['msg'] = $msg;
    }

}

function limpar() {
    unset($_SESSION['idade']);
    unset($_SESSION['msg']);
    $idade = 0;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de anos para dias</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <form action="" method="POST">
        <input type="number" name="idade" id="idade" placeholder="Digite a idade" value="<?php if(isset($_SESSION['idade'])){echo $_SESSION['idade'];}?>" required>
        <input type="submit" name="submit" value="Converter">
        <a href='./' class="btn">Limpar</a>
    </form>

    <span class="resposta">
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
            }
        ?>
    </span>
</body>
</html>