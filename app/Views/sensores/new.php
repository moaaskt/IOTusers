<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .btn { padding: 10px 15px; color: white; text-decoration: none; border-radius: 3px; border: none; cursor: pointer; }
        .btn-success { background-color: #28a745; }
        a.btn-secondary { background-color: #6c757d; display: inline-block; }
    </style>
</head>
<body>
    <h1><?= esc($title) ?></h1>

    <?= validation_list_errors() ?>

    <?= form_open('sensores/create') ?>

        <div class="form-group">
            <label for="nome">Nome do Sensor</label>
            <input type="text" name="nome" id="nome" value="<?= old('nome') ?>" required>
        </div>

        <div class="form-group">
            <label for="tipo">Tipo</label>
            <input type="text" name="tipo" id="tipo" value="<?= old('tipo') ?>">
        </div>

        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="number" step="0.01" name="valor" id="valor" value="<?= old('valor') ?>">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="ativo" <?= old('status') === 'ativo' ? 'selected' : '' ?>>Ativo</option>
                <option value="inativo" <?= old('status') === 'inativo' ? 'selected' : '' ?>>Inativo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="<?= site_url('sensores') ?>" class="btn btn-secondary">Cancelar</a>

    <?= form_close() ?>
</body>
</html>