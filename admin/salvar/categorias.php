<?php
if(isset($_POST)){
    $nome = $_POST["nome"];
    $id_categoria = $_POST["categoria"];

    $sql = "INSERT into categoria (id, nome) VALUES (:id,:nome)";

    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":id", $id_categoria);
    $consulta->bindParam(":nome",$nome);
    $consulta->execute();


}