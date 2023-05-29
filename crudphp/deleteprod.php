<?php 
// Verificar se o array contém o id
if (isset($_GET["id"])) {
    // Se conter, selecionar ID
    $id = $_GET["id"];

    // Cria conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "crudphp";
    $connection = new mysqli($servername,$username,$password,$database);

    // Deletar produto que contém esse id
    $sql = "DELETE FROM produtos WHERE id=$id";
    $connection->query($sql);
}
// Voltar para o index
header("location: /crudproject/crudphp/index.php");
?>