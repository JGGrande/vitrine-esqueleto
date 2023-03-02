<?php 
    require "config.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitrine da Adidas</title>
    <base href="http://localhost:8888/vitrine-esqueleto/">
    <link rel="shortcut icon" href="imagens/icone.png">
    <link rel="stylesheet" href="./estilo.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/lightbox.min.css">
</head>
<body>
    <header>
        <a href="index.php" title="Home">
            <img src="./imagens/logo.png" alt="Adidas">
        </a>

        <nav>
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <?php
                //selecionar todas as categorias
                $sql = "select * from categoria
                order by nome";
                //preparar o sql para execução
                $consulta = $pdo->prepare($sql);
                //executar
                $consulta->execute();

                while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                    //separar os dados
                    $id = $dados->id;
                    $nome = $dados->nome;
                    ?>
                    <li>
                        <a href="categoria/<?=$id?>">
                            <?=$nome?>
                        </a>
                    </li>
                    <?php
                }

                ?>
                <li>
                    <a href="contato">Contato</a>
                </li>
            </ul>
        </nav>
    </header>

    <?php
        //print_r ( $_GET );
        $pagina = "home";
        //verificar se esta enviando o $_GET["param"]
        if ( isset($_GET["param"]) ) {
            $pagina = $_GET["param"];
            $p = explode("/", $pagina);
            $pagina = $p[0];
        }
        //caminho da página para inclusão
        $pagina = "paginas/{$pagina}.php";
        //verificar se o arquivo existe
        if ( file_exists($pagina) ) {
            require $pagina;
        } else {
            require "paginas/erro.php";
        }
    ?>

    <footer>
        <p>Desenvolvido por Maycon Yorrahn Palmeiras</p>
    </footer>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/lightbox.min.js"></script>
</body>
</html>