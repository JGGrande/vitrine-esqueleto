<?php
definirBg("linear-gradient(170deg, #ff86ed 0, #f479e9 16.67%, #db68e2 33.33%, #be55d8 50%, #9f43cf 66.67%, #8037c8 83.33%, #6030c3 100%);");
    if($_POST){
        $login = $_POST['login'] ?? null;
        $senha = $_POST['senha'] ?? null;
        
        if(empty($login) or empty($senha)){
            mensagemErro("Campos não podem ser vazios!");
        }else{

            $sql = "SELECT id,nome,login,senha FROM usuario where login = :login and ativo = 'S' limit 1";
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(":login", $login);       
            $consulta->execute();

            $dados = $consulta->fetch(PDO::FETCH_OBJ);

            //bill
            //gates
            if(!isset($dados->id)){
                mensagemErro("Usuario não encontrado ou inativo.");
            }else if( !password_verify($senha, $dados->senha)  ){
                mensagemErro("Senha invalida!");
            }else{
                //logado
                $_SESSION["usuario"] = array(
                    "id" => $dados->id,
                    "nome" => $dados->nome,
                    "login" => $dados->login
                );
                
                echo"<script>location.href='paginas/home'</script>";
                exit;
            }
        }
               
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

    <h1 class="text-center text-primary">Efetuar Login</h1>
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