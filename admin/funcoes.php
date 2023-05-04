<?php
    //função para mostrar a janela de erro
    function mensagemErro($msg) {
        ?>
        <script>
            Swal.fire({
            icon: "error",
            title: 'Oops...',
            text: '<?=$msg?>',
            }).then((result) => {
                history.back(); 
            })
        </script>
        <?php
        exit;
    } //fim da função

    function confirmarDelete($id){
        ?>
            <script>
                Swal.fire({
                    title: 'Deletar categoria',
                    text: "Tem certeza que deseja deletar a categoria?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, Deletar'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        <?php
                        require "../config.php";
                         $sql = "DELETE FROM categoria WHERE id = :id";
                         $consulta = $pdo->prepare($sql);
                         $consulta->bindParam(":id",$id);
                         $consulta->execute();
                        ?>
                        Swal.fire(
                        'Deleted!',
                        'Deletado com sucesso',
                        'success'
                        )
                    }
                    })
            </script>
        <?php
        exit;
    }


    function definirBg($codigoCss) {
        ?>
        <script>
            document.querySelector("body").style.backgroundImage = "<?=$codigoCss?>";
        </script>


        <?php
    }