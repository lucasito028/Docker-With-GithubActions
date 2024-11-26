<?php
$api_url = "http://api-node-container:3000/usuarios";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add':
                $data = [
                    "nome" => $_POST['nome'],
                    "email" => $_POST['email']
                ];
                $options = [
                    'http' => [
                        'header' => "Content-Type: application/json",
                        'method' => 'POST',
                        'content' => json_encode($data)
                    ]
                ];
                file_get_contents($api_url, false, stream_context_create($options));
                break;

            case 'update':
                $id = $_POST['id'];
                $data = [
                    "nome" => $_POST['nome'],
                    "email" => $_POST['email']
                ];
                $options = [
                    'http' => [
                        'header' => "Content-Type: application/json",
                        'method' => 'PUT',
                        'content' => json_encode($data)
                    ]
                ];
                file_get_contents("$api_url/$id", false, stream_context_create($options));
                break;

            case 'delete':
                $id = $_POST['id'];
                $options = [
                    'http' => [
                        'method' => 'DELETE'
                    ]
                ];
                file_get_contents("$api_url/$id", false, stream_context_create($options));
                break;
        }
    }
}

// Recupera os usuários da API
$usuarios = json_decode(file_get_contents($api_url), true);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Frontend PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastro de Usuario</h1>

    <!-- Formulário para Adicionar Usuário -->
    <form method="POST">
        <h2>Adicionar Usuário</h2>
        <input type="hidden" name="action" value="add">
        Nome: <input type="text" name="nome" required>
        Email: <input type="email" name="email" required>
        <button type="submit">Adicionar</button>
    </form>

    <!-- Lista de Usuários -->
    <h2>Lista de Usuários</h2>
    <ul>
        <?php foreach ($usuarios as $usuario): ?>
            <li>
                <?= $usuario['nome'] ?> - <?= $usuario['email'] ?>

                <!-- Formulário para Alterar Usuário -->
                <form method="POST" style="display: inline;">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                    Nome: <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required>
                    Email: <input type="email" name="email" value="<?= $usuario['email'] ?>" required>
                    <button type="submit">Alterar</button>
                </form>

                <!-- Formulário para Deletar Usuário -->
                <form method="POST" style="display: inline;">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                    <button type="submit">Deletar</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
