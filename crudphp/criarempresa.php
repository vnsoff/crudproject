<?php 
    //Inicializando as variáveis
    $nome = "";
    $cnpj = "";
    $status = "";
    //Inicializando os alertas
    $errorMessage = "";
    $successMessage = "";

    //Cria conexão com o banco de dados
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
            $successMessage = "Empresa adicionada com sucesso";
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
  <title>Nova Empresa</title>
</head>

<body style = "background-color: #e9e9f5;" >
  <!-- Navbar -->
  <ul class="navbar "style="background-color: #212A3E; height: 60px;">
  </ul>

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
        <label for="nome">Nome da Empresa</label>
        <input type="nome" name="nome" class="form-control" value="<?php  echo $nome;?>" placeholder="Insira o nome da empresa">
      </div>
      <div class="form-group">
        <label for="cnpjempresa">CNPJ</label>
        <input type="cnpj" name="cnpj" class="form-control" value="<?php  echo $cnpj;?>" placeholder="Insira o CNPJ da empresa">
      </div>
      <div class="form-check my-2">
        <!-- Botão já preenchido para não causar erros de null -->
        <input class="form-check-input" type="radio" name="status" value="Ativa" checked>
        <label class="form-check-label" for="0">
          Ativa
        </label>
      </div>
      <div class="form-check my-2">
        <input class="form-check-input" type="radio" name="status" value="Inativa">
        <label class="form-check-label" for="1">
          Inativa
        </label>
      </div>
      <!-- Mensagem de sucesso se o produto foi criado -->
      <?php 
      if (!empty ($successMessage)) {
        echo "
        <div class ='alert alert-success alert-dismissible fade show' role 'alert'> 
            <strong>$successMessage</strong>
        </div>
        ";
      }
      ?>
      <!-- O botão criar um produto com os inputs que foram preenchidos -->
      <button type="submit" class="btn btn-primary my-2" name="submit">Criar</button>
      <!-- O botão vai redirecionar para index.php -->      
      <button onclick="location.href='index.php'" type="button" class="btn btn-secondary">Cancelar</button>
      <!-- O botão vai redirecionar para index.php -->
      <button button onclick="location.href='index.php'" type="button" class="btn btn-primary bi bi-box-arrow-left" ></button>

    </form>
  </div>
</body>