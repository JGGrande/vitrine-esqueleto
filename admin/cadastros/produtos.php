<div class="card">
    <div class="card-body">
    <form action="salvar/produtos"  method="POST">
        <label for="nome" class="">Nome do produto</label>
        <input type="text" name="nome" id="nome" class="form-control" required placeholder="Digite o nome do produto!" value="">
        <br>
        <label for="valor">Valor</label>
        <input type="number" name="valor" id="valor"  class="form-control" required placeholder="Digite o valor do produto!" value="">
        <br>
        <label for="descricao">Descrição</label>
        <textarea name="" id="" class="form-control" required placeholder="Digite a descrição do produto!" value=""></textarea>
        <br>
        <label for="imagem">imagens</label>
        <input type="file" name="imagens" id="imagem" class="" required placeholder="" value="">
        <br>
        <label for="categoria">Categoria</label>
        <select name="categoria" id="categoria" class="f" value="">
            <option value="">Categorias</option>
            
            <?php
               $sql = "SELECT id, nome FROM categoria;";
               $consulta = $pdo->prepare($sql);
               $consulta->execute();
               $categorias = $consulta->fetchAll(PDO::FETCH_OBJ);
               
                foreach($categorias as $categoria){
            ?>
                <option value="<?php echo"$categoria->id"?>"><?php echo"$categoria->nome"?></option>
            <?php
            } 
            ?>     
        </select>
        <br>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
    </div>
</div>