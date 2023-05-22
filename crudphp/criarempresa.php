<?php 
    $nome = "";
    $cnpj = "";
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
        $cnpj = $_POST["cnpj"];
        $status = $_POST["status"];

        do {
            if ( empty($nome) || empty($cnpj) ) {
                $errorMessage = "É necessário preencher todos os campos do formulário.";
                break;
            }
            $sql = "INSERT INTO empresas (nome, cnpj, status)" . "VALUES ('$nome', '$cnpj', '$status')";
            $result = $connection->query($sql);
            $nome = "";
            $cnpj = "";
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
  <title>Nova Empresa</title>
</head>

<body>

<div class="container my-5">
    <h2>Nova Empresa</h2>
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
        <label for="nomeempresa">Nome do Produto</label>
        <input type="nome" name="nome" class="form-control" value="<?php  echo $nome;?>" placeholder="Insira o nome da empresa">
      </div>
      <div class="form-group">
        <label for="valorcnpj">Valor do Produto</label>
        <input type="cnpj" name="cnpj" class="form-control" value="<?php  echo $cnpj;?>" placeholder="Insira o cnpj da empresa">
      </div>
      <div class="form-check my-2">
        <input class="form-check-input" type="radio" name="status" value="0" checked>
        <label class="form-check-label" for="0">
          Ativa
        </label>
      </div>
      <div class="form-check my-2">
        <input class="form-check-input" type="radio" name="status" value="1">
        <label class="form-check-label" for="1">
          Inativa
        </label>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Criar</button>
      <button onclick="location.href='index.php'" type="button" class="btn btn-secondary">Cancelar</button>
    </form>
  </div>
</body>