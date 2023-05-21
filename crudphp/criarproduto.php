<?php 
    $nome = "";
    $valor = "";
    $status = "";
    $errorMessage = "";
    $successMessage = "";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "crudphp";

    $connection = new mysqli($servername,$username,$password,$database);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST["nome"];
        $valor = $_POST["valor"];
        $status = $_POST["status"];

        do {
            if ( empty($nome) || empty($valor) ) {
                $errorMessage = "É necessário preencher todos os campos do formulário.";
                break;
            }
            $sql = "INSERT INTO produtos (nome, valor, status)" . "VALUES ('$nome', '$valor', '$status')";
            $result = $connection->query($sql);
            $nome = "";
            $valor = "";
            $status = "";
        }
        while (false);
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
      <div class="form-group">
        <label for="nome">Nome do Produto</label>
        <input type="nomeproduto" name="nome" class="form-control" value="<?php  echo $nome;?>" placeholder="Insira o nome do produto">
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