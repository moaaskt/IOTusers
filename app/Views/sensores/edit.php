<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
    <?= esc($title) ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <h1><?= esc($title) ?></h1>

    <?php if (!empty(session()->getFlashdata('errors')) || !empty(\Config\Services::validation()->getErrors())): ?>
    <div class="alert alert-danger" role="alert">
        <?= \Config\Services::validation()->listErrors() ?>
    </div>
<?php endif; ?>

    <?= form_open('sensores/update/' . $sensor['id']) ?>

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Sensor</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?= old('nome', $sensor['nome']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" name="tipo" id="tipo" class="form-control" value="<?= old('tipo', $sensor['tipo']) ?>">
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="number" step="0.01" name="valor" id="valor" class="form-control" value="<?= old('valor', $sensor['valor']) ?>">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="ativo" <?= old('status', $sensor['status']) === 'ativo' ? 'selected' : '' ?>>Ativo</option>
                <option value="inativo" <?= old('status', 'inativo') === 'inativo' ? 'selected' : '' ?>>Inativo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Sensor</button>
        <a href="<?= site_url('sensores') ?>" class="btn btn-secondary">Cancelar</a>

    <?= form_close() ?>

<?= $this->endSection() ?>