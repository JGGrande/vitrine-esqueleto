<?php
    if($_POST){
        $login = $_POST['login'] ?? null;
        $senha = $_POST['senha'] ?? null;
        
        if(empty($login) or empty($senha)){
            mensagemErro("Campos não podem ser vazios!");
        }

        $sql = "SELECT id,nome,login,senha FROM usuario where login = :login and ativo = 'S' limit 1";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(":login", $login);       
        $consulta->execute();
        $dados = $consulta->fetch(PDO::FETCH_OBJ);
 
        var_dump($dados);
        
        //echo $login;
    }

    
?>


<div class="login rounded bg-light" style="margin-top: 20vh;">
    <h1 class="text-center ">Efetuar Login</h1>
    <form  method="POST">
        <label for="login" class="">Login</label>
        <input type="text" name="login" id="login" class="form-control" required placeholder="Porfavor digite o usuario">
        <br>
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" class="form-control" required placeholder="Porfavor digite a senha">
        <br>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>