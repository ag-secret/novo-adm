<%
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    });
%>


<?php
    if (strpos($this->request->action, 'add') === false) {
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
    <h1 class="title"><?= $titlePrefix . '<%= ucfirst($pluralVar)%>' ?></h1>
    <?= $this->element('Adm.Breadcrumb', [
        'bcOptions' => [
            'active' => $titlePrefix . '<%= ucfirst($pluralVar)%>',
            'children' => [
                [
                    'text' => '<%= ucfirst($pluralVar)%>',
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
                    <?= $this->Form->create($<%= $singularVar %>); ?>
                            <?php
                    <%
                            foreach ($fields as $field) {
                                if (in_array($field, $primaryKey)) {
                                    continue;
                                }
                                if (isset($keyFields[$field])) {
                                    $fieldData = $schema->column($field);
                                    if (!empty($fieldData['null'])) {
                    %>
                                echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'empty' => true]);
                    <%
                                    } else {
                    %>
                                echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>]);
                    <%
                                    }
                                    continue;
                                }
                                if (!in_array($field, ['created', 'modified', 'updated'])) {
                                    $fieldData = $schema->column($field);
                                    if (($fieldData['type'] === 'date') && (!empty($fieldData['null']))) {
                    %>
                                echo $this->Form->input('<%= $field %>', array('empty' => true, 'default' => ''));
                    <%
                                    } else {
                    %>
                                echo $this->Form->input('<%= $field %>');
                    <%
                                    }
                                }
                            }
                            if (!empty($associations['BelongsToMany'])) {
                                foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
                    %>
                                echo $this->Form->input('<%= $assocData['property'] %>._ids', ['options' => $<%= $assocData['variable'] %>]);
                    <%
                                }
                            }
                    %>
                            ?>
                        <br>

                        <?= $this->Form->button(__('Salvar alterações')) ?>
                        <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
