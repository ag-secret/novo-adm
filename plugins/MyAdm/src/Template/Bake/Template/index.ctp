<%
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return !in_array($schema->columnType($field), ['binary', 'text']);
    })
    ->take(7);
%>
<?= $this->assign('title', 'Adm ' . ucfirst($appName) . ' - ' . '<%= ucfirst($pluralVar)%>') ?>

<div class="page-header">
    <h1 class="title"><%= ucfirst($pluralVar) %></h1>
    <?= $this->element('MyAdm.Breadcrumb', [
        'bcOptions' => [
            'active' => '<%= ucfirst($pluralVar) %>',
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
            '<span class="fa fa-plus"></span> Adicionar <%= ucfirst($pluralVar) %>',
            [
                'action' => 'add'
            ],
            [
                'class' => 'btn btn-danger',
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
                <% foreach ($fields as $field): %>
                    <th><?= $this->Paginator->sort('<%= $field %>') ?></th>
                <% endforeach; %>
                    <th style="width: 140px"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($<%= $pluralVar %> as $<%= $singularVar %>): ?>
                                <tr>
            <%        foreach ($fields as $field) {
                        $isKey = false;
                        if (!empty($associations['BelongsTo'])) {
                            foreach ($associations['BelongsTo'] as $alias => $details) {
                                if ($field === $details['foreignKey']) {
                                    $isKey = true;
            %>
                        <td>
                            <?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?>
                        </td>
            <%
                                    break;
                                }
                            }
                        }
                        if ($isKey !== true) {
                            if (!in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
            %>
                        <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
            <%
                            } else {
            %>
                        <td><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></td>
            <%
                            }
                        }
                    }

                    $pk = '$' . $singularVar . '->' . $primaryKey[0];
            %>

                                    <td class="text-center">
                                        <div class="btn-group">
                                            <?= $this->Html->link(
                                                '<span class="glyphicon glyphicon-pencil"></span>',
                                                [
                                                    'action' => 'edit',
                                                    <%= $pk %>
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
                                                    <%= $pk %>
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
                <% foreach ($fields as $field): %>
                    <th><?= $this->Paginator->sort('<%= $field %>') ?></th>
                <% endforeach; %>
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