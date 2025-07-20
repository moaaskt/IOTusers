<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CRUD Sensores | <?= $this->renderSection('title') ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <?php if (session()->get('isLoggedIn')): ?>
      <nav class="navbar bg-light mb-4">
        <div class="container">
          <span class="navbar-text">
            Olá, <strong><?= esc(session()->get('nome')) ?></strong>
          </span>
          <a href="<?= site_url('logout') ?>" class="btn btn-outline-danger btn-sm">Sair (Logout)</a>
        </div>
      </nav>
    <?php endif; ?>

    <div class="container mt-4">
        <?= $this->renderSection('content') ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>