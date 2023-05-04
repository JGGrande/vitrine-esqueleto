<?php 
    
    if(isset($_POST)){
        $id = $_POST["id"] ?? NULL;
        if(empty($id)){
            mensagemErro("Erro ao Deletar!");
        }else{
            $sql = "DELETE FROM categoria WHERE id = :id";
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(":id",$id);
            $consulta->execute();
                       
            mensagemDelete();

        }

    }

    