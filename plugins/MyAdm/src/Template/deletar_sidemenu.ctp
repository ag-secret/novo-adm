<?php

$myPermissions = [];
if ($loggedInUser['permissions']) {
    foreach ($loggedInUser['permissions'] as $value) {
        $myPermissions[] = $value['controller'];
    }
}
?>
<div class="sidebar clearfix">
    <?php foreach ($sidemenuItems as $key => $item): ?>
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