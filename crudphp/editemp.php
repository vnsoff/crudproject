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

//Se o método de request do servidor for GET
if ($_SERVER['REQUEST_METHOD'] =='GET') {
  //Se não tiver o id
  if (!isset($_GET["id"])) {
  //Se não houver ID, retornar para o index.php
  header("location: /crudproject/crudphp/index.php");
  exit;
  }

  //Pega o id atual, seleciona tudo que tem relacionado a esse id na tabela produtos (no banco de dados) 
  //E mostra na tela esses campos preenchidos
  $id = $_GET["id"];
  $sql = "SELECT * FROM empresas WHERE id=$id";
  $result = $connection->query($sql);
  $row = $result->fetch_assoc();

  //Se não há  linhas na tabela, ou seja, não há informações, retornar ao index.php também
  if (!$row) {
    header("location: /crudproject/crudphp/index.php");
  }

  $nome = $row["nome"];
  $cnpj = $row["cnpj"];
  $status = $row["status"];

}

//POST
else {
  //Utiliza o método post para guardar arrays de todos os inputs e o id desse formulário
  $id = $_POST["id"];
  $nome = $_POST["nome"];
  $cnpj = $_POST["cnpj"];
  $status = $_POST["status"];
  do {
  //Se não estiverem preenchidos todos os campos do formulário, mostrar mensagem de erro
    if ( empty($id) || empty($nome) || empty($cnpj) || empty($status) ) {
      $errorMessage = "É necessário preencher todos os campos do formulário.";
      break;
  }
  //Atualiza no bando de dados as variáveis nome, cnpj e status de acordo com o id deste item
  $sql ="UPDATE empresas SET nome = '$nome', cnpj = '$cnpj', status = '$status' WHERE id = $id";
  $result = $connection->query($sql);
  //Mostra o erro de conexão quando não foi possível enviar a atualização para o banco de dados
  if (!$result) {
    $errorMessage = "Query inválido: " . $connection->error;
    break;
    }

  } while (false);
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Meta tags obrigatórias-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" crossorigin="anonymous">            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <title>Alterar Empresa</title>
</head>

<body>

<div class="container my-5">
    <h2>Alterar Empresa</h2>
    <?php 
    if (!empty ($errorMessage)) {
        echo "
        <div class ='alert alert-warning alert-dismissible fade show' role 'alert'> 
            <strong>$errorMessage</strong>
        </div>
        ";
    }
    ?>
    <!-- Formulário -->
    <form method="post">
      <!-- Id secreto para não ser ajustado nem visível para o usuário, precisa existir para completar o formulário -->
      <input type ="hidden" name = "id" value="<?php  echo $id;?>">
      <div class="form-group">
        <label for="nome">Nome da Empresa</label>
        <input type="nome" name="nome" class="form-control" value="<?php  echo $nome;?>" placeholder="Insira o nome do produto">
      </div>
      <div class="form-group">
        <label for="cnpjempresa">CNPJ</label>
        <input type="cnpj" name="cnpj" class="form-control" value="<?php  echo $cnpj;?>" placeholder="Insira o cnpj do produto">
      </div>
      <div class="form-check my-2">
        <input class="form-check-input" type="radio" name="status" value="Ativa" <?php echo ($status=='Ativa')?'checked':'' ?>>
        <label class="form-check-label" for="0">
          Ativa
        </label>
      </div>
      <div class="form-check my-2">
        <input class="form-check-input" type="radio" name="status" value="Inativa" <?php echo ($status=='Inativa')?'checked':'' ?>>
        <label class="form-check-label" for="1">
          Inativa
        </label>
      </div>

      <!-- O botão enviar o POST (contendo inputs do formulário) -->
      <button type="submit" class="btn btn-primary" name="submit">Alterar</button>

      <!-- O botão vai redirecionar para index.php -->
      <button onclick="location.href='index.php'" type="button" class="btn btn-secondary">Cancelar</button>

      <!-- O botão vai redirecionar para index.php -->
      <button button onclick="location.href='index.php'" type="button" class="btn btn-primary bi bi-box-arrow-left" ></button>

  </form>
  </div>
</body>