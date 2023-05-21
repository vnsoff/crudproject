<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Tabelas</title>
</head>

<body>
  <?php 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "crudphp";

  // cria a conexão com o servidor
  $connection = new mysqli($servername,$username,$password,$database);

  // verifica se a conexão aconteceu, se não acontece, aparece o erro
  if ($connection->connect_error) {
    die("A conexão falhou: " . $connection->connect_error);
  }
  $sql = "SELECT * FROM produtos";
  $result = $connection->query($sql);

  $sql2 = "SELECT * FROM empresas";
  $result2 = $connection->query($sql2);


  // verifica se a conexão aconteceu, se não acontece, aparece o erro
  if (!$result) {
    die("A conexão falhou: " . $connection->connect_error);
  }
  ?>

<!-- Tabela de produtos -->
<div class="container my-5">
  <h2>Tabela de Produtos</h2>
  <p>A tabela abaixo contém os produtos.</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome do Produto</th>
        <th>Valor</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      while ($row = $result->fetch_assoc()) {
      //verifica se o bool é 1 ou 0 e muda para uma nova variavel
      if ($row["status"] == "0") {
        $row["status"] = "Sim";
      } else {
        $row["status"] = "Não";
      }
      echo "<tr>
                <td>$row[id]</td>
                <td>$row[nome]</td>
                <td>$row[valor]</td>
                <td>$row[status]</td>
            </tr>";
           }
      ?>
    </tbody>
  </table>
  <button type="submit" class="btn btn-primary" name="submit" href='crudphp/criarproduto.php'>Adicionar Produto</button>     
</div>  

<!-- Tabela de Empresas -->
<div class="container my-5">
  <h2>Tabela de Empresas</h2>
  <p>A tabela abaixo contém as empresas.</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome da Empresa</th>
        <th>CNPJ</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      while ($row = $result2->fetch_assoc()) {
      //verifica se o bool é 1 ou 0 e muda para uma nova variavel
      if ($row["status"] == "0") {
        $row["status"] = "Ativa";
      } else {
        $row["status"] = "Inativa";
      }
      echo "<tr>
                <td>$row[id]</td>
                <td>$row[nome]</td>
                <td>$row[valor]</td>
                <td>$row[status]</td>
            </tr>";
           }
      ?>

    </tbody>
  </table>
  <button type="submit" class="btn btn-primary" name="submit" href='/criarempresas.php'>Adicionar Empresa</button>     
</div>  
</body>
</html>