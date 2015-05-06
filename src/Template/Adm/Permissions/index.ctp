<?= $this->assign('title', 'Adm ' . ucfirst($appName) . ' - ' . 'Permissions') ?>

<div class="page-header">
    <h1 class="title">Permissions</h1>
    <?= $this->element('MyAdm.Breadcrumb', [
        'bcOptions' => [
            'active' => 'Permissions',
            'children' => [
                [
                    'text' => 'Home',
                    'url' => []
                ]
            ]
        ]
    ]) ?>

    <div class="right">
        <?= $this->Html->link(
            '<span class="fa fa-question"></span> Ajuda',
            [],
            [
                'class' => 'btn btn-default',
                'escape' => false
            ])
        ?>
        <?= $this->Html->link(
            '<span class="fa fa-plus"></span> Adicionar Permissions',
            [
                'action' => 'add'
            ],
            [
                'class' => 'btn btn-success',
                'escape' => false
            ])
        ?>
    </div>
</div>

<div class="container-widget">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-title">
                    Pesquisa
                </div><!-- Panel title -->
                <div class="panel-body">
                    <form method="GET" class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Pesquisar..." id="q" name="q" value="<?= $this->request->query('q') ?>">
                        </div>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </form><!-- Form de pesquisa -->
                    </div><!-- panel-body -->
            </div><!-- panel panel-default pesquisa -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('id') ?></th>
                                    <th><?= $this->Paginator->sort('user_id') ?></th>
                                    <th><?= $this->Paginator->sort('controller') ?></th>
                                    <th style="width: 140px"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($permissions as $permission): ?>
                                <tr>
                                    <td><?= $this->Number->format($permission->id) ?></td>
                                    <td>
                            <?= $permission->has('user') ? $this->Html->link($permission->user->name, ['controller' => 'Users', 'action' => 'view', $permission->user->id]) : '' ?>
                        </td>
                                    <td><?= h($permission->controller) ?></td>
            
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <?= $this->Html->link(
                                                '<span class="glyphicon glyphicon-pencil"></span>',
                                                [
                                                    'action' => 'edit',
                                                    $permission->id
                                                ],
                                                [
                                                    'escape' => false,
                                                    'class' => 'btn btn-xs btn-light',
                                                    'title' => 'Editar'
                                                ])
                                                ?>
                                            <?= $this->Form->postLink(
                                                '<span class="glyphicon glyphicon-remove"></span>',
                                                [
                                                    'action' => 'delete',
                                                    $permission->id
                                                ],
                                                [
                                                    'escape' => false,
                                                    'class' => 'btn btn-xs btn-light',
                                                    'confirm' => 'Você tem certeza que deseja deletar este item?',
                                                    'title' => 'Remover'
                                                ])
                                            ?>
                                        </div>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                            </tbody>
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('id') ?></th>
                                    <th><?= $this->Paginator->sort('user_id') ?></th>
                                    <th><?= $this->Paginator->sort('controller') ?></th>
                                    <th style="width: 140px"></th>
                                </tr>
                            </thead>
                        </table>
                    </div><!-- table-responsive -->
                    <div style="margin-top: 40px;">
                        <?= $this->element('MyAdm.Paginator') ?>
                    </div><!-- Breadcrumb container -->
                </div><!-- panel-body -->
            </div><!-- panel-default -->
        </div><!-- col-md-12 -->
    </div><!-- row -->
</div><!-- container -->