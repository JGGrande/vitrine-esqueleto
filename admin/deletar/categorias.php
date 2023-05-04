<?php 
    
    if(isset($_POST)){
        $id = $_POST["id"] ?? NULL;
        if(empty($id)){
            mensagemErro("Erro ao Deletar!");
        }else{
            print_r("teste");
            confirmarDelete($id);
            echo"<script>location.href='listar/categorias'</script>";
        }

    }

    