<!DOCTYPE html>
<html lang="fr">
<head>
    <?= view('partials/head') ?>
</head>
<body>

    <?= $this->renderSection('content') ?>

    <?= view('partials/footer') ?>

    <script src="<?= base_url('js/app.js') ?>"></script>
</body>
</html>