<?php
//Verifica se existe a requisição POST
if(isset($_POST)){
    //pega os dados da requisição e coso não existam atribui Nulo para as variaveis
    $nome = $_POST["nome"] ?? NULL;
    $id_categoria = $_POST["categoria"] ?? NULL;
    //Verifica se a variavel $nome está vazia, se estiver exibe um alerta 
    if(empty($nome)){
        mensagemErro("Nome é necessario");
        exit;
    } 
    //a varaiavel recebe em string a query sql que vai ser executado 
    $sql = "SELECT id FROM categoria WHERE id <> :id AND nome = :nome";
    //prepara o sql para a execução
    $consulta = $pdo->prepare($sql);
    //seta o valor da variavel no atributo presente no sql
    $consulta->bindParam(":id", $id_categoria);
    $consulta->bindParam(":nome", $nome);
    //Executa a query
    $consulta->execute();
    //Transforma os registros retornados em um objeto PHP e armazena ele na variavel
    $dados = $consulta->fetch(PDO::FETCH_OBJ);
        //se o atributo id, da varivel que tem os dados do banco de dados, não estiver vazia dispara um alerta, siguinificando que a categoria já existe em outro ID 
        if(!empty($dados->id)){
            mensagemErro("Produto já cadastrado");
        }
        //Entra se a variavel, que o valor vem da requisição, estiver vazia, siguinifica que não foi passo um id_cateroria então será criado depois do ultimo registro
        if(empty($id_categoria)){
            //a varaiavel recebe em string a query sql que vai ser executado 
            $sql = "INSERT into categoria (nome) VALUES (:nome)";
            //prepara o sql para a execução
            $consulta = $pdo->prepare($sql);
            //seta o valor da variavel no atributo presente no sql
            $consulta->bindParam(":nome",$nome);
            //Executa a query
            $consulta->execute();
            //Redireciona o Usuario para a pagina listar/categorias
            mensagemSucesso("Criado com sucesso","listar/categorias");
     
        //Entra se a categoria já existir, então o registro será atualizado envez de ser criado    
        }else{
            //a varaiavel recebe em string a query sql que vai ser executado 
            $sql = "UPDATE categoria SET nome = :nome  WHERE id = :id ";
            //prepara o sql para a execução
            $consulta = $pdo->prepare($sql);
            //seta o valor da variavel no atributo presente no sql
            $consulta->bindParam(":nome", $nome);
            $consulta->bindParam(":id", $id_categoria);
            //Executa a query
            $consulta->execute();
            //Redireciona para listar/categorias
            mensagemSucesso("Editado com sucesso", "listar/categorias");
        
            
        }

}