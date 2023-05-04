<div class="card">
    <div class="card-body">
        <table class="table table-striped ">
            <thead class="bg-primary">
                <tr>
                <th scope="col" class="text-light">ID</th>
                <th scope="col" class="text-light">Nome da categoria</th>
                <th scope="col" class="text-light">Opções</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT id, nome FROM categoria ";
                $consulta = $pdo->prepare($sql);
                $consulta->execute();
                $categorias = $consulta->fetchAll(PDO::FETCH_OBJ);

                foreach($categorias as &$categoria){
                ?>
                <tr>
                    <th scope="row"><?php echo"$categoria->id"?></th>
                    <td><?php echo"$categoria->nome"?></td>
                    <td class="d-flex justify-content-around">
                        <a href="cadastros/categorias/<?php echo"$categoria->id"?>" class="btn btn-success">Editar</a>
                        <form action="deletar/categorias" method="post">
                            <input type="hidden" name="id" value="<?php echo"$categoria->id"?>">
                            <input type="submit" class="btn btn-danger" value="Excluir">
                        </form>
                    </td>
                    
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        
    </div>
</div>