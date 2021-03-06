
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

<?= $this->assign('title', 'Adm ' . ucfirst($appName) . ' - ' . $titlePrefix . 'Permissions') ?>

<div class="page-header">
    <h1 class="title"><?= $titlePrefix . 'Permissions' ?></h1>
    <?= $this->element('MyAdm.Breadcrumb', [
        'bcOptions' => [
            'active' => $titlePrefix . 'Permissions',
            'children' => [
                [
                    'text' => 'Permissions',
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
                    <?= $this->Form->create($permission); ?>
                            <?php
                                                    echo $this->Form->input('user_id', ['options' => $users]);
                                                    echo $this->Form->input('controller');
                                                ?>
                        <br>

                        <?= $this->Form->button(__('Salvar alterações')) ?>
                        <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
