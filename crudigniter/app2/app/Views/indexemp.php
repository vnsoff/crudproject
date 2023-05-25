
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Empresas</title>
</head>

<body>
    <!-- Tabela de Empresas -->
    <div class="container mt-5">
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
                    <a class='btn btn-primary btn-sm' href=''>Edit</a>
                    <a class='btn btn-danger btn-sm' href=''>Edit</a>
                </td>
            </tr>
            <?php endforeach; ?>

        </table>
    </div>
</body>
</html>