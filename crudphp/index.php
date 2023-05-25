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

<body style = "background-color: #e9e9f5;" >
  <!-- Navbar -->
  <ul class="navbar "style="background-color: #212A3E; height: 60px;">
  </ul>
  
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
  $sql_prod = "SELECT * FROM produtos";
  $result_prod = $connection->query($sql_prod);

  $sql_emp = "SELECT * FROM empresas";
  $result_emp = $connection->query($sql_emp);

  // verifica se a conexão aconteceu, se não acontece, aparece o erro
  if (!$result_prod) {
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
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      while ($row = $result_prod->fetch_assoc()) {
      echo "<tr>
                <td>$row[id]</td>
                <td>$row[nome]</td>
                <td>$row[valor]</td>
                <td>$row[status]</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='/crudproject/crudphp/editprod.php?id=$row[id]'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='/crudproject/crudphp/deleteprod.php?id=$row[id]'> Deletar </a>
                </td>

            </tr>";
           }
      ?>
    </tbody>
  </table>

    <!-- Botao Adicionar Produtos -->
  <button onclick="location.href='criarproduto.php'" type="submit" class="btn btn-primary" name="submit">Adicionar Produto</button>     
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
        <th>Status</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      while ($row = $result_emp->fetch_assoc()) {
      echo "<tr>
                <td>$row[id]</td>
                <td>$row[nome]</td>
                <td>$row[cnpj]</td>
                <td>$row[status]</td>
                <td>
                <a class='btn btn-primary btn-sm' href='/crudproject/crudphp/editemp.php?id=$row[id]'>Edit</a>
                <a class='btn btn-danger btn-sm' href='/crudproject/crudphp/deleteemp.php?id=$row[id]'> Deletar </a>
                </td>
            </tr>";
           }
      ?>
    </tbody>
  </table>

  <!-- Botao Adicionar Empresas -->
  <button onclick="location.href='criarempresa.php'" type="submit" class="btn btn-primary" name="submit">Adicionar Empresa</button>     
</div>
</body>
</html>