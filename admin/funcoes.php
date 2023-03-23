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
    function definirBg($codigoCss) {
        ?>
        <script>
            document.querySelector("body").style.backgroundImage = "<?=$codigoCss?>";
        </script>


        <?php
    }