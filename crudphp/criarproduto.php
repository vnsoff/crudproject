<?php 
    //Inicializando as variáveis
    $nome = "";
    $valor = "";
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
            $successMessage = "Produto adicionado com sucesso";
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
  <title>Novo Produto</title>
</head>

<body style = "background-color: #e9e9f5;" >
  <!-- Navbar -->
  <ul class="navbar "style="background-color: #212A3E; height: 60px;">
  </ul>

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
      <div class="form-group">
        <label for="nome">Nome do Produto</label>
        <input type="nome" name="nome" class="form-control" value="<?php  echo $nome;?>" placeholder="Insira o nome do produto">
      </div>
      <div class="form-group">
        <label for="valorproduto">Valor do Produto</label>
        <input type="valor" name="valor" class="form-control" value="<?php  echo $valor;?>" placeholder="Insira o valor do produto">
      </div>
      <div class="form-check my-2">
        <!-- Botão já preenchido para não causar erros de null -->
        <input class="form-check-input" type="radio" name="status" value="Sim" checked>
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