<?= $this->assign('title', 'Adm ' . ucfirst($appName) . ' - Usuários') ?>

<div class="page-header">
    <h1 class="title">Usuários</h1>
    <?= $this->element('MyAdm.Breadcrumb', [
        'bcOptions' => [
            'active' => 'Usuários',
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
            ]
        ) ?>
        <?= $this->Html->link('<span class="fa fa-plus"></span> Adicionar Usuários', ['action' => 'add'], ['class' => 'btn btn-danger', 'escape' => false]) ?>
    </div>
</div>

<div class="container-widget">
        <div class="row">
            <div class="col-md-12">
                
                <div class="panel panel-default tey">
                    <div class="panel-title">
                        Pesquisa
                    </div>
                    <form method="GET" class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control" name="q" id="q" placeholder="Pesquisar..." value="<?= $this->request->query('q')?>">
                        </div>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </form>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>
                                    <?= $this->Paginator->sort('name') ?>
                                </th>
                                <th class="text-center" style="width: 180px;"><?= $this->Paginator->sort('is_active', 'Status') ?></th>
                                <th style="width: 80px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td>
                                    <?= h($user->name) ?>
                                    <br>
                                    <?= h($user->email) ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($user->is_active): ?>
                                        <small class="label label-success">Ativo</small>
                                    <?php else: ?>
                                        <small class="label label-danger">Inativo</small>
                                    <?php endif ?>
                                </td>
                                                    <td class="text-center">
                                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $user->id], ['escape' => false, 'class' => 'btn btn-xs btn-light', 'title' => 'Editar']) ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                        </tbody>
                        <thead>
                            <tr>
                                                    <th><?= $this->Paginator->sort('name') ?></th>
<th class="text-center"><?= $this->Paginator->sort('is_active', 'Status') ?></th>
                                                    <th  style="width: 140px"></th>
                            </tr>
                        </thead>
                    </table>
                    </div>
                    <div style="margin-top: 40px;">
                        <?= $this->element('MyAdm.Paginator') ?>
                    </div>
                </div>
            </div>
        </div>
</div>