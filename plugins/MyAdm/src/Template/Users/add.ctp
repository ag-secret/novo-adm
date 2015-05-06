<?= $this->assign('title', 'Adm ' . ucfirst($appName) . ' - Adicionando Usuário') ?>

<div class="page-header">
    <h1 class="title">Adicionar Usuário</h1>
    <?= $this->element('MyAdm.Breadcrumb', [
        'bcOptions' => [
            'active' => 'Adicionar Usuário',
            'children' => [
                [
                    'text' => 'Usuários',
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
                    Criar
                </div>
                <div class="panel-body">
                    <?= $this->Form->create($user, ['novalidate' => true]); ?>
                        <?php
                            echo $this->Form->input('name', ['label' => 'Nome']);
                            echo $this->Form->input('email', ['label' => 'Email']);
                            echo $this->Form->input('password', ['label' => 'Senha']);
                            echo $this->Form->input('confirm_password', [
                                'label' => 'Confirmar Senha',
                                'type' => 'password'
                            ]);
                        ?>
                    
                        <?= $this->element('Users/permissions_form') ?>

                        <br>
                        <?= $this->Form->input('is_active', ['type' => 'checkbox', 'label' => 'Ativo']); ?>
                        <br>
                        <?= $this->Form->button(__('Salvar informações')) ?>
                        <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
