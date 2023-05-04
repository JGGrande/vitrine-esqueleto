<?php
    $servidor = "localhost";
    $usuario  = "root";
    $senha    = "root";
    $banco    = "vitrine";

    try {
        $pdo = new PDO("mysql:host={$servidor};dbname={$banco};port=8889;charset=utf8;",$usuario,$senha);
    } catch (Exception $e) {
        echo "<p>Erro ao tentar conectar</p>";
        echo $e->getMessage();
    }

   function formatarValor($valor) {
        // 10.000,00 -> 10000.00
        $valor = str_replace(".","", $valor);
        return str_replace(",",".", $valor);
    }