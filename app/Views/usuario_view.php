<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PinkSide - Biblioteca Online</title>
    <style>
        body {
            background-color: #142738;
            color: #FFFFFF;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;

        }

        header {
            background-color: #df566d;
            padding: 20px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            height: 80px;

        }

        h1 {
            margin: 0;
        }

        .search-bar {
            text-align: center;
            padding: 20px;
            margin: 0;
        }

        .user-area {
            text-align: right;
            padding: 10px;

        }

        .user-settings {
            text-align: right;
            padding: 10px;
        }


        .title {
            color: black;
            font-size: 20px;
            /* text-align: center; */
            margin-top: 20px;

        }

        span {
            color: #142738;
            font-size: 20px;
            vertical-align: auto;

        }
    </style>
</head>



<body>
    <h1>Dados do Usuário</h1>

    <table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>CPF</th>
        </tr>
    </thead>
    <header>
        <?php foreach ($usuario as $u) : ?>
            <tr>
                <td><?= $u->nome; ?></td>
                <td><?= $u->email; ?></td>
                <td><?= $u->cpf; ?></td>
            </tr>
        <?php endforeach; ?>
    </header>
</body>
</html>

</html>