<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
    <?= esc($title) ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <h1><?= esc($title) ?></h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <p>
        <a href="<?= site_url('sensores/new') ?>" class="btn btn-success mb-3">Adicionar Novo Sensor</a>
    </p>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome do Sensor</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($sensores) && is_array($sensores)): ?>
                <?php foreach ($sensores as $sensor): ?>
                    <tr>
                        <td><?= esc($sensor['id']) ?></td>
                        <td><?= esc($sensor['nome']) ?></td>
                        <td><?= esc($sensor['tipo']) ?></td>
                        <td><?= esc($sensor['valor']) ?></td>
                        <td>
                            <span class="badge <?= ($sensor['status'] === 'ativo') ? 'bg-success' : 'bg-danger' ?>">
                                <?= esc($sensor['status']) ?>
                            </span>
                        </td>
                        <td class="d-flex" style="gap: 5px;">
                            <a href="<?= site_url('sensores/edit/' . $sensor['id']) ?>" class="btn btn-primary btn-sm">Editar</a>
                            <?= form_open('sensores/delete/' . $sensor['id'], ['onsubmit' => "return confirm('Tem certeza que deseja excluir este sensor?');", 'class' => 'd-inline']) ?>
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            <?= form_close() ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Nenhum sensor encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

<?= $this->endSection() ?>