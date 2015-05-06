<?= $this->assign('title', 'Adm ' . ucfirst($appName) . ' - ' . 'Articles') ?>

<div class="page-header">
    <h1 class="title">Articles</h1>
    <?= $this->element('MyAdm.Breadcrumb', [
        'bcOptions' => [
            'active' => 'Articles',
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
            '<span class="fa fa-plus"></span> Adicionar Articles',
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
                                    <th><?= $this->Paginator->sort('title') ?></th>
                                    <th><?= $this->Paginator->sort('text') ?></th>
                                    <th style="width: 140px"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($articles as $article): ?>
                                <tr>
                                    <td><?= $this->Number->format($article->id) ?></td>
                                    <td><?= h($article->title) ?></td>
                                    <td><?= h($article->text) ?></td>
            
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <?= $this->Html->link(
                                                '<span class="glyphicon glyphicon-pencil"></span>',
                                                [
                                                    'action' => 'edit',
                                                    $article->id
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
                                                    $article->id
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
                                    <th><?= $this->Paginator->sort('title') ?></th>
                                    <th><?= $this->Paginator->sort('text') ?></th>
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