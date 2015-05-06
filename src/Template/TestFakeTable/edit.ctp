

<?php
    if (1 == 1) {
        $titlePrefix = 'Adicionando ';
        $formTitle = 'Criar';
        $submitText = 'Salvar informações';
    } else {
        $titlePrefix = 'Editando ';
        $formTitle = 'Editar';
        $submitText = 'Salvar alterações';
    } 
?>

<div class="page-header">
    <h1 class="title"><?= $titlePrefix . 'TestFakeTable' ?></h1>
    <?= $this->element('MyAdm.Breadcrumb', [
        'bcOptions' => [
            'active' => $titlePrefix . 'TestFakeTable',
            'children' => [
                [
                    'text' => 'TestFakeTable',
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
                    <?= $this->Form->create($testFakeTable); ?>
                            <?php
                                                    echo $this->Form->input('name');
                                                    echo $this->Form->input('idade');
                                                    echo $this->Form->input('birthdate');
                                                    echo $this->Form->input('password');
                                                    echo $this->Form->input('sex');
                                                ?>
                        <br>

                        <?= $this->Form->button(__('Salvar alterações')) ?>
                        <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
