<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { padding: 5px 10px; color: white; text-decoration: none; border-radius: 3px; }
        .btn-add { background-color: #28a745; }
        .btn-edit { background-color: #007bff; }
        .btn-delete { background-color: #dc3545; }
    </style>
</head>
<body>
<?php if (session()->getFlashdata('success')): ?>
    <div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>


    <h1><?= esc($title) ?></h1>

    <p>
        <a href="<?= site_url('sensores/new') ?>" class="btn btn-add">Adicionar Novo Sensor</a>
    </p>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome do Sensor</th>
            <th>Tipo</th>
            <th>Valor</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>

        <?php if (!empty($sensores) && is_array($sensores)): ?>
            <?php foreach ($sensores as $sensor): ?>
                <tr>
                    <td><?= esc($sensor['id']) ?></td>
                    <td><?= esc($sensor['nome']) ?></td>
                    <td><?= esc($sensor['tipo']) ?></td>
                    <td><?= esc($sensor['valor']) ?></td>
                    <td><?= esc($sensor['status']) ?></td>
                    <td>
                        <a href="#" class="btn btn-edit">Editar</a>
                        <a href="#" class="btn btn-delete">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Nenhum sensor encontrado.</td>
            </tr>
        <?php endif; ?>
    </table>

</body>
</html>