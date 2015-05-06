<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
    <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />

    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('../components/bootstrap/dist/css/bootstrap.min') ?>
    <?= $this->Html->css('Adm.root') ?>
    <?= $this->Html->css('Adm.extra_style') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>

<body>

    
    <div class="loading"><!-- Start Page Loading -->
        <?= $this->Html->image('Adm.loading.gif', ['alt' => 'loading-img']) ?>
    </div><!-- End Page Loading -->


    <?= $this->fetch('content') ?>

    <?= $this->Html->script('../components/jquery/dist/jquery.min') ?>
    <?= $this->Html->script('../components/bootstrap/dist/js/bootstrap.min') ?>
    <!-- Js responsavel pelas interações -->
    <?= $this->Html->script('Adm.plugins') ?>
    <?= $this->Html->script('Adm.common') ?>

    <?= $this->fetch('script') ?>

</body>
</html>
