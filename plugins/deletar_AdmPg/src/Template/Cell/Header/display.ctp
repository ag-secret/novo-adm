
<!-- START TOP -->
    <div id="top" class="clearfix">
        <!-- Start App Logo -->
        <div class="applogo">
            <?= $this->Html->link($options['appName'], $options['logoLink'], ['class' => 'logo']) ?>
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
        <form class="searchform">
            <input type="text" class="searchbox" id="searchbox" placeholder="Search">
            <span class="searchbutton"><i class="fa fa-search"></i></span>
        </form>
        <!-- End Searchbox -->

        <!-- Start Sidepanel Show-Hide Button -->
        <!-- <a href="#sidepanel" class="sidepanel-open-button"><i class="fa fa-outdent"></i></a> -->
        <!-- End Sidepanel Show-Hide Button -->

        <!-- Start Top Right -->
        <ul class="top-right">

            <li class="dropdown link">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle hdbutton">Criar novo <span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-list">
                  <li><a href="#"><i class="fa falist fa-paper-plane-o"></i>Product or Item</a></li>
                  <li><a href="#"><i class="fa falist fa-font"></i>Blog Post</a></li>
                  <li><a href="#"><i class="fa falist fa-file-image-o"></i>Image Gallery</a></li>
                  <li><a href="#"><i class="fa falist fa-file-video-o"></i>Video Gallery</a></li>
                </ul>
            </li>

            <li class="dropdown link" style="margin: 0 5px 0 15px;">
              <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox">
                <?= $this->Html->image('Adm.profileimg.png') ?><strong>Jonathan Doe</strong><span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
                  <li><a href="#"><i class="fa falist fa-wrench"></i>Configutações da conta</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="fa falist fa-power-off"></i> Sair</a></li>
                </ul>
            </li>
        </ul>
    <!-- End Top Right -->
    </div>
    <!-- END TOP -->
    <!-- //////////////////////////////////////////////////////////////////////////// --> 