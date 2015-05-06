<?= $this->assign('title', 'Adm ' . ucfirst($appName) . ' - Editando usuário') ?>

<div class="page-header">
    <h1 class="title">Editar usuário</h1>
    <?= $this->element('MyAdm.Breadcrumb', [
        'bcOptions' => [
            'active' => 'Editar usuário',
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
                    Editar
                </div>
                <div class="panel-body">
                    <?= $this->Form->create($user, ['novalidate' => true]); ?>
                            <?php
                                echo $this->Form->input('name', ['label' => 'Nome']);
                                echo $this->Form->input('email');

                                echo $this->element('Users/permissions_form');

                                echo '<hr>';
                                echo $this->Form->input('new_password', ['help' => 'Caso não queira alterar a senha deixar este campo em branco.', 'label' => 'Nova Senha', 'required' => false, 'type' => 'password']);
                                echo $this->Form->input('confirm_password', ['label' => 'Confirmar nova senha', 'type' => 'password']);
                                echo '<hr>';
                                echo $this->Form->input('is_active', ['type' => 'checkbox', 'label' => 'Ativo']);
                            ?>
                        <br>

                        <?= $this->Form->button(__('Salvar alterações')) ?>
                        <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
