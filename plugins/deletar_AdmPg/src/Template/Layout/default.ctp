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
    <?= $this->Html->css('AdmPlugin.root') ?>
    <?= $this->Html->css('AdmPlugin.extra_style') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>

<body>

    
    <div class="loading"><!-- Start Page Loading -->
        <?= $this->Html->image('AdmPlugin.loading.gif', ['alt' => 'loading-img']) ?>
    </div><!-- End Page Loading -->

    <?= $this->Flash->render(); ?>

    <?= $this->element('AdmPlugin.Header') ?>

    <?= $this->element('AdmPlugin.sidemenu') ?>

    <div class="content">
        <?= $this->fetch('content') ?>
        <?= $this->element('AdmPlugin.Footer') ?>
    </div>

    <?= $this->Html->script('../components/jquery/dist/jquery.min') ?>
    <?= $this->Html->script('../components/bootstrap/dist/js/bootstrap.min') ?>
    
    
    <?= $this->Html->script('AdmPlugin.bootstrap-select/bootstrap-select') ?>
    <?= $this->Html->script('AdmPlugin.bootstrap-toggle/bootstrap-toggle.min') ?>
    
    <!-- Js responsavel pelas interações -->
    <?= $this->Html->script('AdmPlugin.plugins') ?>
    <?= $this->Html->script('AdmPlugin.common') ?>

    <?= $this->fetch('script') ?>

</body>
</html>
