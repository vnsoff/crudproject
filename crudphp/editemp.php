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
    <input type="hidden">
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
    </form>
  </div>
</body>