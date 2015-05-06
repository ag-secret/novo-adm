
<?php
    if ($this->request->params['action'] == 'add') {
        $titlePrefix = 'Adicionando ';
        $formTitle = 'Criar';
        $submitText = 'Salvar informações';
    } else {
        $titlePrefix = 'Editando ';
        $formTitle = 'Editar';
        $submitText = 'Salvar alterações';
    } 
?>

<?= $this->assign('title', 'Adm ' . ucfirst($appName) . ' - ' . $titlePrefix . 'Users') ?>

<div class="page-header">
    <h1 class="title"><?= $titlePrefix . 'Users' ?></h1>
    <?= $this->element('MyAdm.Breadcrumb', [
        'bcOptions' => [
            'active' => $titlePrefix . 'Users',
            'children' => [
                [
                    'text' => 'Users',
                    'url' => ['action' => 'index']
                ]
            ]
        ]
    ]) ?>
</div>

<div class="container-widget">
    <div class="row">
        <div class="col-md-12">
            
            <div class="panel panel-default">
                <div class="panel-title">
                    <?= $formTitle ?>
                </div>
                <div class="panel-body">
                    <?= $this->Form->create($user); ?>
                            <?php
                                                    echo $this->Form->input('name');
                                                    echo $this->Form->input('email');
                                                    echo $this->Form->input('password');
                                                    echo $this->Form->input('is_active');
                                                ?>
                        <br>

                        <?= $this->Form->button(__('Salvar alterações')) ?>
                        <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
