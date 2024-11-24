<?php
$api_url = "http://api-node-container:3000/usuarios";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
}

$usuarios = json_decode(file_get_contents($api_url), true);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Frontend PHP</title>
</head>
<body>
    <h1>Usuários</h1>
    <form method="POST">
        Nome: <input type="text" name="nome" required>
        Email: <input type="email" name="email" required>
        <button type="submit">Adicionar</button>
    </form>
    <ul>
        <?php foreach ($usuarios as $usuario): ?>
            <li><?= $usuario['nome'] ?> - <?= $usuario['email'] ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
