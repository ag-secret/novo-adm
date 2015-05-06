<?php

$items = [
    'Main' => [
        [
            'text' => 'Artigos',
            'icon' => 'rss',
            'url' => '#',
            'label' => [
                'text' => 'New',
                'type' => 'danger',
            ],
            'more' => [
                [
                    'text' => 'Artigos',
                    'url' => [],
                ]
            ]
        ],
        [
            'text' => 'Tags',
            'icon' => 'tags',
            'url' => ['action' => 'tey'],
        ]
    ],
    'Configurações Gerais' => [
        [
            'text' => 'Usuários do sistema',
            'icon' => 'user',
            'url' => ['action' => 'tey'],
        ]
    ]
];

?>

<div class="sidebar clearfix">
    <?php foreach ($items as $key => $item): ?>
        <ul class="sidebar-panel nav">
            <li class="sidetitle"><?= strtoupper($key) ?></li>
            <?php foreach ($item as $subitem): ?>
                <li>
                    <?php 
                        $label = '<span class="icon color5"><span class="fa fa-'.$subitem['icon'].'"></span></span>'. $subitem['text'];
                        $label .= isset($subitem['label']) ? '<span class="label label-'.$subitem['label']['type'].'">'.$subitem['label']['text'].'</span>' : '';
                        $label .= isset($subitem['more']) ? '<span class="caret"></span>' : '';
                    ?>
                    <?= $this->Html->link(
                        $label,
                        $subitem['url'],
                        ['escape' => false
                    ]) ?>
                    <?php if (isset($subitem['more'])): ?>
                        <ul>
                            <?php foreach ($subitem['more'] as $moreItem): ?>
                                <li>
                                    <?= $this->Html->link(
                                        $moreItem['text'],
                                        $moreItem['url']
                                    ) ?>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    <?php endif ?>
                </li>
            <?php endforeach ?>
        </ul>
    <?php endforeach ?>
</div>