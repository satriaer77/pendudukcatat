<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url("resources") ?>/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url("resources") ?>/img/favicon.png">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url("resources") ?>/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url("resources") ?>/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?= base_url("resources") ?>/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url('resources/css/argon-dashboard.min.css') ?>?v=1.0.7" rel="stylesheet" />
    <title><?= $title ?></title>
</head>
<body class="container">

    <?= $this->include('penduduk/templates/navbar') ?>
    <main class="main-content mt-0">
        <section>
            <?= $this->renderSection('content') ?>
        </section>
    </main>
    
    <script type="text/javascript" src="<?= base_url("resources/js/argon-dashboard.min.js") ?>"></script>
    <script type="text/javascript" src="<?= base_url("resources/js/core/bootstrap.min.js") ?>"></script>
    <script type="text/javascript" src="<?= base_url("resources/js/core/popper.min.js") ?>"></script>
    <script type="text/javascript" src="<?= base_url("resources/js/core/jquery-3.6.3.min.js") ?>"></script>
</body>
</html>