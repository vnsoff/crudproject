<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Empresas</title>

<!--     Estilo dos botões de paginação da tabela -->
    <style>
        ul.pagination li {
            display: inline;
        }
        ul.pagination li a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }
        .active {
            background-color: #8c96ad;
            color: white;
        }
        ul.pagination li a:hover:not(.active) {
            background-color: #ddd;
        }
    </style>
    <script>
        function confirma () {
            if (!confirm('Deseja excluir o produto?')) {
                return false;
            }
            return true;
        }
    </script>
</head>

<body style = "background-color: #e1e6f2">
    <!-- Navbar -->
    <ul class="navbar justify-content-center "style="background-color: #9baaba; height: 70px;">
    <?php echo anchor('produtos', 'Produtos', 'class="btn btn-dark mx-4"'); ?>
    <?php echo anchor('empresas', 'Empresas', 'class="btn btn-dark mx-4"'); ?>
    </ul>
    <!-- Tabela de empresas -->
    <div class="container mt-5">
    <?php echo anchor(base_url('empresas/criar'), 'Nova Empresa', ['class'=>'btn btn-success mb-4'])?>
        <h3>Tabela de Empresas</h3>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Empresa</th>
                <th>CNPJ</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
            <?php foreach($indexemp as $empresas): ?>
            <tr>
                <td><?php echo $empresas['id']?></td>
                <td><?php echo $empresas['nome']?></td>
                <td><?php echo $empresas['cnpj']?></td>
                <td><?php echo $empresas['status']?></td>
                <td>
                    <?php echo anchor ('empresas/edit/' . $empresas['id'], 'Editar')?>
                    <?php echo anchor ('empresas/delete/' . $empresas['id'], 'Deletar', ['onclick' => 'return confirma()'])?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php echo $pager->links();?>
    </div>
</body>
</html>