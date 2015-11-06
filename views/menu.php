<div class="left">
    <div id="menu" class="menu">
        <div class="menu-title">
            <a href="<?php echo SITE_ROOT; ?>">
                <img src="<?php echo SITE_ROOT; ?>/public/img/logo-fibprensa2.png">
                <!--span>Campañas</span-->
            </a>
        </div>

        <div class="menu-profile">
            <div class="menu-profile-pic">
                <img src="<?php echo SITE_ROOT; ?>/public/img/icon-guest.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="menu-profile-info">
                <span>Hola,</span>
                <h2><?php echo $data['username']; ?></h2>
            </div>
        </div>

        <div class="menu-content">
            <div class="menu_section">
                <ul class="menu-items">
                    <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-desktop"></i> Home </a>
                    </li>
                    <li><a><i class="fa fa-paper-plane-o"></i> Campañas <span class="glyphicon glyphicon-chevron-down"></span></a>
                        <ul class="menu-child-items">
                            <li><a href="<?php echo SITE_ROOT; ?>/campaigns/add">Crear campaña</a>
                            </li>
                            <li><a href="<?php echo SITE_ROOT; ?>/campaigns/view">Ver campañas</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="<?php echo SITE_ROOT; ?>/newsletters/view"><i class="fa fa-envelope-o"></i> Newsletters</a></li>
                </ul>
            </div>
        </div>

        <!--div class="menu-footer">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div-->

    </div>
</div>