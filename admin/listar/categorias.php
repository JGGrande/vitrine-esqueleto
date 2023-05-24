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
                        <a href="cadastros/categorias/<?php echo"$categoria->id"?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                        <form class="form-deletar">
                            <input type="hidden" id="id" name="id" value="<?php echo"$categoria->id"?>">
                            <button type="submit" id="btn-delete" class="btn btn-danger"><i class="bi bi-trash"></i></button>
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

<script>
    $(document).ready(() => {
        $('.form-deletar').on('submit', (event) => {
            event.preventDefault();

            Swal.fire({
                title: 'Deseja deletar?',
                text: "Será deletado permanentemente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, delete!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = $(this);
                    const id = form.find('input[name="id"]').val();

                    $.ajax({
                        type: 'POST',
                        //url: form.attr('action'),
                        url: 'http://localhost:8888/vitrine-esqueleto/admin/deletar/categorias',
                        data: { id: id },
                        success: function(response) {
                            Swal.fire(
                            'Deletado!',
                            'A categoria foi deletada com sucesso.',
                            'success'
                            ).then( response => window.location.reload(true))
                        
                        },
                        error: function(error) {
                            // Lógica para lidar com erros na requisição
                            console.error('Erro ao excluir a categoria:', error);
                            Swal.fire({
                                icon: "error",
                                title: 'Oops...',
                                text: 'Erro ao deletar tente novamente',
                            }).then((result) => {
                                history.back(); 
                            })
                        }
                    });

                    
                }
            })

            
        });
});


</script>