<?php
//Inicializando as variáveis
$id = "";
$nome = "";
$valor = "";
$status = "";

//Conexão
$servername = "localhost";
$username = "root";
$password = "";
$database = "crudphp";
$connection = new mysqli($servername,$username,$password,$database);


//Inicializando os alertas
$errorMessage= "";
$successMessage= "";

//Se o método de request do servidor for GET
if ($_SERVER['REQUEST_METHOD'] =='GET') {
  //Se não tiver o id
  if (!isset($_GET["id"])) {
  //
  header("location: /crudproject/crudphp/index.php");
  exit;
  } 
  $id = $_GET["id"];
  $sql = "SELECT * FROM produtos WHERE id=$id";
  $result = $connection->query($sql);
  $row = $result->fetch_assoc();

  if (!$row) {
    header("location: /crudproject/crudphp/index.php");
  }

  $nome = $row["nome"];
  $valor = $row["valor"];
  $status = $row["status"];

}

//POST
else {
  $id = $_POST["id"];
  $nome = $_POST["nome"];
  $valor = $_POST["valor"];
  $status = $_POST["status"];
  do {
    if ( empty($id) || empty($nome) || empty($valor) || empty($status) ) {
      $errorMessage = "É necessário preencher todos os campos do formulário.";
      break;
  }
  $sql ="UPDATE produtos SET nome = '$nome', valor = '$valor', status = '$status' WHERE id = $id";
        
  $result = $connection->query($sql);

  if (!$result) {
    $errorMessage = "Query inválido: " . $connection->error;
    break;
    } 
  $successMessage = "Dados atualizados com sucesso.";
  header("location: /crudproject/crudphp/index.php");
  exit;
  } while (false);
}

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" crossorigin="anonymous">            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <title>Alterar Produto</title>
</head>

<body>

<div class="container my-5">
    <h2>Alterar Produto</h2>
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
      <input type ="hidden" name = "id" value="<?php  echo $id;?>">
      <div class="form-group">
        <label for="nome">Nome do Produto</label>
        <input type="nome" name="nome" class="form-control" value="<?php  echo $nome;?>" placeholder="Insira o nome do produto">
      </div>
      <div class="form-group">
        <label for="valorproduto">Valor do Produto</label>
        <input type="valor" name="valor" class="form-control" value="<?php  echo $valor;?>" placeholder="Insira o valor do produto">
      </div>
      <div class="form-check my-2">
        <input class="form-check-input" type="radio" name="status" value="Sim">
        <label class="form-check-label" for="0">
          Sim
        </label>
      </div>
      <div class="form-check my-2">
        <input class="form-check-input" type="radio" name="status" value="Não">
        <label class="form-check-label" for="1">
          Não
        </label>
      </div>

      <!-- O botão vai redirecionar para a mesma página como não tem uma outra página endereçada -->
      <button type="submit" class="btn btn-primary" name="submit">Alterar</button>

      <!-- O botão vai redirecionar para index.php -->
      <button onclick="location.href='index.php'" type="button" class="btn btn-secondary">Cancelar</button>

      <!-- O botão vai redirecionar para index.php -->
      <button button onclick="location.href='index.php'" type="button" class="btn btn-primary bi bi-box-arrow-left" ></button>

  </form> 
  
  <!-- $_POST (Pacote com as informações)= {
id = ""// id do produto
nome = ""// nome do produto
valor = ""// valor do produto
status = ""// status do produto
  } -->

  </div>
</body>