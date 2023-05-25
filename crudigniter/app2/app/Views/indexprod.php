
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Produtos</title>
</head>

<body>
    <!-- Navbar -->
    <ul class="navbar justify-content-center "style="background-color: #212A3E; height: 70px;">
    <a class='btn btn-secondary btn-sm mx-3' href='/produtos'>Produtos</a>
    <a class='btn btn-secondary btn-sm mx-3' href='/empresas'>Empresas</a>
    </ul>
    <!-- Tabela de produtos -->
    <div class="container mt-5">
        <h3>Tabela de Produtos</h3>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Nome do Produto</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
            <?php foreach($indexprod as $produtos): ?>
            <tr>
                <td><?php echo $produtos['id']?></td>
                <td><?php echo $produtos['nome']?></td>
                <td><?php echo $produtos['valor']?></td>
                <td><?php echo $produtos['status']?></td>
                <td>
                    <a class='btn btn-primary btn-sm' href=''>Edit</a>
                    <a class='btn btn-danger btn-sm' href=''>Edit</a>
                </td>
            </tr>
            <?php endforeach; ?>

        </table>
    </div>
</body>
</html>