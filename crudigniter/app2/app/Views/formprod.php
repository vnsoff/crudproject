<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Editar Produto</title>
</head>
<body>
    <div class="container mt-5">
        <h3>Adicionar Produto</h3>
        <?php echo form_open('produtos/store')?>

        <div class="form-group"> 
            <label for="nome"> Nome do produto </label>
            <input type="text" value = "<?php echo isset($nome ['nome']) ? $nome['nome'] : '' ?>" name="nome" id="nome" class="form-control"> </input>
        </div>
        <div class="form-group"> 
            <label for="valor"> Valor</label>
            <input type="text" value = "<?php echo isset($valor ['valor']) ? $nome['valor'] : '' ?>" name="valor" id="valor" class="form-control"> </input>
        </div>
        <div class="form-check my-2">
        <!-- Botão já preenchido para não causar erros de null -->
        <input class="form-check-input" type="radio" id = "status" name="status" value="Sim" checked>
        <label class="form-check-label" for="0">
          Sim
        </label>
        </div>
        <div class="form-check my-2">
        <input class="form-check-input" type="radio" name="status"  id = "status" value="Não">
        <label class="form-check-label" for="1">
          Não
        </label>
        </div>
          <!-- Botao Adicionar Produtos -->
          <input type="submit" value="Salvar" class="btn btn-success"></input>
          <input type="hidden" value = "<?php echo isset($id ['id']) ? $id['id'] : '' ?>" name="id" id="id"></input>
          <?php echo anchor('produtos', 'Cancelar', 'class="btn btn-dark mx-4"'); ?>
          <?php echo form_close();?>
        </div>
</body>
</html>