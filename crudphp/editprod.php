<?php
// Cria conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$database = "crudphp";
$connection = new mysqli($servername,$username,$password,$database);

$id = "";
$nome = "";
$valor = "";
$status = "";

// Alertas
$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD']) {
  //Metodo Get: mostrar os dados e verifica se o id existe
  if(!isset($_GET["id"])) {
    header("location: /crudphp/index.php");
    exit;
  }
  $id = $_GET["id"];
  $sql_prod = "SELECT * FROM produtos WHERE id=$id";
  $result_prod = $connection->query($sql_prod);
  $row = $result_prod->fetch_assoc();
  if (!$row) {
    header("location: /crudphp/index.php");
    exit;
  }
  $nome = $row["nome"];
  $valor = $row["valor"];
  $status = $row["status"];
} else {
  //Metodo Post: atualiza os dados
  $id = $_POST["id"];
  $nome = $_POST["nome"];
  $valor = $_POST["valor"];
  $status = $_POST["status"];
}

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <title>Novo Produto</title>
</head>

<body>

<div class="container my-5">
    <h2>Novo Produto</h2>
    <?php 
    if (!empty ($errorMessage)) {
        echo "
        <div class ='alert alert-warning alert-dismissible fade show' role 'alert'> 
            <strong>$errorMessage</strong>
        </div>
        ";
    }
    ?>
    <form method="post">
      <input type="hidden" value="<?php  echo $id;?>" >
      <div class="form-group">
        <label for="nome">Nome do Produto</label>
        <input type="nome" name="nome" class="form-control" value="<?php  echo $nome;?>" placeholder="Insira o nome do produto">
      </div>
      <div class="form-group">
        <label for="valorproduto">Valor do Produto</label>
        <input type="valor" name="valor" class="form-control" value="<?php  echo $valor;?>" placeholder="Insira o valor do produto">
      </div>
      <div class="form-check my-2">
        <input class="form-check-input" type="radio" name="status" value="0" checked>
        <label class="form-check-label" for="0">
          Sim
        </label>
      </div>
      <div class="form-check my-2">
        <input class="form-check-input" type="radio" name="status" value="1">
        <label class="form-check-label" for="1">
          Não
        </label>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Criar</button>     
    </form>
  </div>
</body>