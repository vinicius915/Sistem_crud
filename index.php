<?php 

    $pdo = new PDO(
        'mysql:host = localhost db = bdd_log', 'root', 'root'
    );

    //inserindo usuario e senha 
    if(isset($_POST['nome'])){
        $sql = $pdo -> prepare("INSERT INTO usuarios VALUES (null, ? , ?) ");
        $sql->execute(array($_POST['nome'], $_POST['senha']));
        echo 'usuario inserido';
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>

    <!--=============== FONTAWESOME ===============-->
    <script src="https://kit.fontawesome.com/2c07fe46a8.js" crossorigin="anonymous"></script>


    <!--=============== BOOTSTRAP ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

         <!--=============== CSS ===============-->
         <link rel="stylesheet" href="css/style.css">
</head>
<body>
    

<div class="field-center">
    <div class="conteiner">
        <form method="POST">
            <fieldset class="field-form">
                
            <legend >ADM</legend>

            <label style="margin-left: 5px;"> Usuario: </label>
            <input id="chackbox" type="text" placeholder="..." name="nome" >

            <label style="margin-left: 17px;"> Senha: </label>
            <input id="chackbox" type="password" placeholder="..." name="senha">

            <input  class="btn btn-primary btn-lg btn-block mt-4" type="submit" name="send" value="Enviar" >
            </fieldset>
        </form>
        </div>
</div>

    <!--======================== Listagem de users ============================-->
        <?php

        $sql = $pdo->prepare("SELECT * FROM usuarios");
        $sql->execute();
        
        $fetchUsuarios = $sql->fetchAll();

        foreach ($fetchUsuarios as $key => $value)
        {
        echo '<a href= "?delete= '. $value['Codig_usuario'] .'">' .$value['Nome_usuarios']. '|' .$value['Senha_usuario']. '</a>';
        echo '<hr>';
        }

        ?>
</body>
</html>