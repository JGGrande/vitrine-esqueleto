<?php
    $nome = NULL;
    $mensagemBtn = "Cadastrar";
    if(!empty($id)){
        $sql = "SELECT nome,id FROM categoria WHERE id = :id";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(":id", $id);
        $consulta->execute();
        $dados = $consulta->fetch(PDO::FETCH_OBJ) ?? NULL;

        $mensagemBtn = "Editar";

        $id = $dados->id ?? null;
        $nome = $dados->nome ?? null;
        
        ?>
            <script>
                $(document).ready(()=>{
                    $('#id').attr('readonly', 'readonly');
                })
            </script>
        <?php
       
    }
?>
<div class="card">
    <div class="card-header">
        <h2 class="float-left">Cadastro de categorias</h2>

        <div class="float-right">
            <a href="listar/categorias" class="btn btn-success">
                Listar Categorias
            </a>
        </div>
    </div>
    <div class="card-body" >
    <form  method="POST" action="salvar/categorias">
        <label for="nome" class="">Nome da Categoria</label>
        <input type="text" name="nome" id="nome" class="form-control" required placeholder="Digite o nome da categoria!" value="<?php echo"$nome";?>">
        <br>
        <label for="senha">ID da Categória (Opcional)</label>
        <input type="number" name="categoria" id="id" class="form-control" placeholder="Digite o ID da Categoria" value="<?php echo"$id";?>">
        <br>
        <button type="submit" class="btn btn-primary"><?php echo"$mensagemBtn";?></button>
    </form>
    </div>
</div>