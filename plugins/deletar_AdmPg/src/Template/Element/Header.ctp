<!-- START TOP -->
<div id="top" class="clearfix">
    <!-- Start App Logo -->
    <div class="applogo">
        <?= $this->Html->link($appName, $logoLink, ['class' => 'logo']) ?>
    </div>
    <!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button">
        <i class="fa fa-bars"></i>
    </a>
    <a href="#" class="sidebar-open-button-mobile">
        <i class="fa fa-bars"></i>
    </a>
    <!-- End Sidebar Show Hide Button -->

    <!-- Start Searchbox -->
<!--     <form class="searchform">
        <input type="text" class="searchbox" id="searchbox" placeholder="Pesquisar...">
        <span class="searchbutton"><i class="fa fa-search"></i></span>
    </form> -->
    <!-- End Searchbox -->

    <!-- Start Sidepanel Show-Hide Button -->
    <!-- <a href="#sidepanel" class="sidepanel-open-button"><i class="fa fa-outdent"></i></a> -->
    <!-- End Sidepanel Show-Hide Button -->

    <!-- Start Top Right -->
    <ul class="top-right">
        <li class="dropdown link">
          <a href="#" data-toggle="dropdown" class="dropdown-toggle hdbutton">Criar novo <span class="caret"></span></a>
            <ul class="dropdown-menu dropdown-menu-list">
				<?php foreach ($sidemenuItems as $key => $value): ?>
					<?php foreach ($value as $item): ?>
						<?php if (isset($item['quickAdd'])): ?>
							<li>
								<?= $this->Html->link('<span class="fa falist fa-'.$item['icon'].'"></span> ' . $item['text'], ['controller' => $item['url']['controller'], 'action' => 'add'], ['escape' => false]) ?>
							</li>
						<?php endif ?>
					<?php endforeach ?>
				<?php endforeach ?>
            </ul>
        </li>

        <li class="dropdown link" style="margin: 0 5px 0 15px;">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox">
                <?= $this->Html->image('Adm.profileimg.png') ?>
                <strong>
                    <?= $loggedInUser['name'] ?>
                </strong>
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
                <li>
                    <?= $this->Html->link(
                        '<span class="fa falist fa-wrench"></span> Configurações de conta',
                        ['plugin' => 'Adm', 'controller' => 'Users', 'action' => 'settings', 'prefix' => false],
                        ['escape' => false]
                    ) ?>
                </li>
                <li class="divider"></li>
                <li>
                    <?= $this->Html->link(
                        '<i class="fa falist fa-power-off"></i> Sair',
                        ['controller' => 'Users', 'action' => 'logout', 'plugin' => 'Adm', 'prefix' => false],
                        ['escape' => false])
                    ?>
                </li>
            </ul>
        </li>
    </ul>
<!-- End Top Right -->
</div>
<!-- END TOP -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 