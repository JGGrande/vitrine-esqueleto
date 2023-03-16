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
 
        if(!isset($dados->id)){
            mensagemErro("Usuario não encontrado ou inativo.");
        }
        if(!isset($dados->senha)){
            mensagemErro("Senha invalida!");
        }
        
        //echo $login;
    }

    
?>


<div class="login rounded " style="
margin-top: 20vh; 
background: rgba(255, 255, 255, 0.43);
box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
backdrop-filter: blur(5.2px);
-webkit-backdrop-filter: blur(5.2px);
border: 1px solid rgba(255, 255, 255, 0.1);
">

    <h1 class="text-center text-light">Efetuar Login</h1>
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